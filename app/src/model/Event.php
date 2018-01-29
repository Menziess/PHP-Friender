<?php

namespace app\src\model;

use app\src\Model;
use app\src\model\User;
use app\src\model\Answer;
use app\src\model\Conversation;

class Event extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"activity_id",
		"conversation_id",
		"expiry_date"
	];

	/**
	 * Get events for user.
	 */
	public static function getEventsForUser(int $userid)
	{
		$date = time();
		$statement = Model::db()->query(
			"SELECT *
			FROM event_user
			INNER JOIN user ON user_id = user.id
			INNER JOIN event ON event_id = event.id
			LEFT JOIN activity ON activity.id = event.id
			LEFT JOIN picture ON picture.id = activity.picture_id
			WHERE event_user.user_id = $userid
			AND event.expiry_date < $date
			ORDER BY event.id DESC;"
		);

		$statement->execute();
		return $statement->fetchAll();
	}

	/**
	 * Get matches for event.
	 *
	 * @param integer $id
	 * @return void
	 */
	public static function getMatchesForEvent(int $id)
	{
		$statement = Model::db()->query(
			"SELECT *
			FROM event_user
			INNER JOIN user ON event_user.user_id = user.id
			LEFT JOIN picture ON picture.id = user.picture_id
			WHERE event_user.event_id = $id"
		);

		$statement->execute();
		return $statement->fetchAll();
	}

	/**
	 * Determines distance between two strings of binary numbers.
	 *
	 * @param string $user1
	 * @param string $user2
	 * @return void
	 */
	private static function HammingDistance(string $s1, string $s2)
	{
		if (strlen($s1) !== strlen($s2))
			echo 'not same length';

		$array1 = str_split($s1);
		$array2 = str_split($s2);

		$dh = 0;
		for ($i = 0; $i < count($array1); $i++)
			if ($array1[$i] == $array2[$i]) $dh++;
		return $dh;
	}

	/**
	 * Get all unmatched users and find best matches.
	 *
	 * @param User $user
	 * @param array $potentialMatches
	 * @return array
	 */
	private static function matchAllUsers(User $user, array $potentialMatches)
	{
		if (!$user->answers)
			return;

		# Stores the scores in array
		$scores = [];

		# Calculate score for each potential match
		foreach ($potentialMatches as $match) {

			if (!$match->answers)
				continue;
			if (strlen($match->answers) != Answer::ANSWER_COUNT)
				continue;

			# De match id's zijn de keys van de array
			$score = self::HammingDistance($user->answers, $match->answers);
			$scores[$match->id] = $score;
		}

		return $scores;
	}

	/**
	 * Create match.
	 */
	public static function match(User $user)
	{
		$users = User::query(
			"SELECT * from user
			LEFT JOIN  event_user on event_user.user_id = user.id
			WHERE user.answers IS NOT NULL
			AND event_user.user_id IS NULL"
		);

		if (empty($users))
			echo 'No users found.';

		# Berekent match score tussen ingelogde user en iedereen en zichzelf
		$scores = self::matchAllUsers($user, $users);

		# Remove yourself
		unset($scores[$user->id]);

		$matches = [];
		for ($i = 0; $i <= 2; $i++) {
			$match_value = max($scores);
			if ($match_value >= Answer::MATCH_TRESHOLD) {
				$match_id = array_search($match_value, $scores);
				$matches[$match_id] = $match_value;
				unset($scores[$match_id]);
			}
			else
				return;
		}
		self::createEvent($user, $matches);
	}

	/**
	 * Create event.
	 *
	 * @return void
	 */
	public static function createEvent(User $user, array $matches)
	{
		# Random activiteit ophalen uit database
		$activities = Activity::all();
		if (empty($activities))
			throw new \Exception("No activities in database. ");

		$index = array_rand($activities);
		$activity_id = $activities[$index]->id;

		# Create new conversation
		$conversation = Conversation::create([]);

		# create expiry date
		$expiry_date = strtotime("+1 week");

		# Create event
		$event = parent::create([
			"activity_id" => $activity_id,
			"conversation_id" => $conversation->id,
			"expiry_date" => $expiry_date
		]);

		# Users toevoegen aan event_user tussentabel
		$event_id = $event->id;
		$query =
			"INSERT INTO event_user (event_id, user_id)
			VALUES ($event_id, $user->id);";

		foreach ($matches as $id => $value) {
			$query .= " INSERT INTO event_user (event_id, user_id)
			VALUES ($event_id, $id);";
		}

		Model::db()->query($query);
	}
}
