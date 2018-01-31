<?php

namespace app\src\model;

use app\src\Mail;
use app\src\Model;
use app\src\Controller;
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
	public static function getEventForUser(int $userid)
	{
		$date = date('Y-m-d', time());
		$statement = Model::db()->query(
			"SELECT *
			FROM event_user
			INNER JOIN user ON user_id = user.id
			INNER JOIN event ON event_id = event.id
			LEFT JOIN activity ON activity.id = event.id
			LEFT JOIN picture ON picture.id = activity.picture_id
			WHERE event_user.user_id = $userid
			AND event.expiry_date >= '$date'
			ORDER BY event.id DESC
			LIMIT 1;"
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
			"SELECT *, user.id AS user_id
			FROM event_user
			INNER JOIN user ON event_user.user_id = user.id
			LEFT JOIN picture ON picture.id = user.picture_id
			WHERE event_user.event_id = $id"
		);

		$statement->execute();
		return $statement->fetchAll();
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
			$score = Answer::HammingDistance($user->answers, $match->answers);
			$scores[$match->id] = $score;
		}

		return $scores;
	}

	/**
	 * Find matches for user.
	 *
	 * @param User $user
	 * @return array
	 */
	public static function match(User $user)
	{
		$users = User::query(
			"SELECT * from user
			LEFT JOIN  event_user on event_user.user_id = user.id
			WHERE user.answers IS NOT NULL
			AND event_user.user_id IS NULL"
		);

		# Indien geen of maar 1 user wordt gevonden
		if (empty($users) || $users instanceof User)
			return [];

		# Berekent match score tussen ingelogde user en iedereen en zichzelf
		$scores = self::matchAllUsers($user, $users);

		# Remove yourself
		unset($scores[$user->id]);

		# Create a group of the user and 3 matches
		$matches = [];
		for ($i = 0; $i < 3; $i++) {
			$match_value = max($scores);
			if ($match_value >= Answer::MATCH_TRESHOLD) {
				$match_id = array_search($match_value, $scores);
				$matches[$match_id] = $match_value;
				unset($scores[$match_id]);
			}
			else
				return [];
		}
		return $matches;
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
		$expiry_date = date("Y-m-d", strtotime("+1 week"));

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

		$query .= self::addFriendsEachother($user, $matches);

		Model::db()->query($query);
		return $event;
	}

	/**
	 * Send email notifications.
	 *
	 * @param User $user
	 * @param array $matches
	 * @return void
	 */
	public function sendMailNotifications(User $user, array $matches)
	{
		$mail = new Mail();

		# Send mail to matches
		foreach ($matches as $id => $score) {
			$match = User::find($id);
			$mail->send($match, 'Je hebt een nieuw event!', 'test');
		}

		# Send mail to user
		$mail->send($user, 'Je hebt een nieuw event!', 'test');
	}

	/**
	 * Add eachother to friendlist.
	 *
	 * @param User $user
	 * @param array $matches
	 * @return string $query
	 */
	public function addFriendsEachother(User $user, array $matches)
	{
		$query = " ";
		$ids = array_keys($matches);

		# Add matches to user frienlist
		foreach ($ids as $id) {
			$query .=
				"INSERT IGNORE INTO user_user (user_id, friend_id, is_accepted)
				VALUES ($user->id, $id, 1);";

			foreach ($ids as $id_other) {
				if ($id_other > $id)
					$query .=
						"INSERT IGNORE INTO user_user (user_id, friend_id, is_accepted) VALUES ($id, $id_other, 1);";
					$query .=
						"INSERT IGNORE INTO user_user (user_id, friend_id, is_accepted) VALUES ($id_other, $id, 1);";
			}
		}

		# Add everyone else to matches friendlists
		return $query;
	}
}
