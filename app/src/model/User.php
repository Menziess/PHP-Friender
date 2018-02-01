<?php

namespace app\src\model;

use app\src\Model;
use app\src\Router;
use app\src\Request;
use app\src\Controller;
use app\src\model\Session;

class User extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public static $attributes = [
		"first_name",
		"last_name",
		"date_of_birth",
		"email",
		"password",
		"picture_id",
		"answers",
		"bio",
		"is_admin",
		"is_active",
		"is_banned",
		"conversation_id",
		"notifications",
	];

	public static $required = [
		"first_name",
		"last_name",
		"date_of_birth",
		"email",
		"password",
	];

	/**
	 * Checks if user is authenticated.
	 */
	public function auth()
	{
		if (!empty(Request::$auth))
			return Request::$auth;

		Controller::redirect('/login', [
			'message' => 'Je moet ingelogd zijn om dit te kunnen zien. '
		]);
		exit;
	}

	/**
	 * Check if user is permitted.
	 */
	public function permit(int $id)
	{
		$potentialHacker = self::auth();
		$hacker_id = $potentialHacker->id;

		if ($hacker_id == $id || $potentialHacker->is_admin){
			return $potentialHacker;
		}
		Router::error(401);
		exit;
	}

	/**
	 * Checks if user is authenticated.
	 */
	public function admin()
	{
		$admin = Request::$auth;
		if (!empty($admin) && $admin->is_admin)
			return $admin;

		Router::error(401);
		exit;
	}

	/**
	 * Check if user is friends with other user.
	 */
	public function friend(int $friend_id)
	{
		# Jij zelf
		$user = self::auth();

		# Ben je admin? Dan is alles prima
		if ($user->is_admin)
			return $user;

		# Haal vriend op die jou als vriend ziet!
		$friend = User::select()
			->join('user_user', 'user.id', 'user_user.user_id')
			->where('user.id', '=', $friend_id)
			->where('user_user.friend_id', '=', $user->id)
			->where('user_user.is_accepted', '=', 1)
			->get(1);

		if (!empty($friend))
			return $user;

		Router::error(401);
		exit;
	}

	/**
	 * Validates all inputs for creating and updating users.
	 *
	 * @param array $credentials
	 * @return array
	 */
	public static function validator(array &$credentials)
	{
		# Hash password
		if (isset($credentials["password"]))
			$credentials["password"] =
				password_hash($credentials["password"], PASSWORD_DEFAULT);

		# Validate email
		if (isset($credentials['email']))
			if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL))
				throw new \Exception("Email is not valid.");

		# Confirm password
		if (isset($credentials["password_confirm"]))
			if (!isset($credentials["password"]) ||
				$credentials["password_confirm"] !== $credentials["password"])
					throw new \Exception("Passwords don't match.");

		return $credentials;
	}

	/**
	 *
	 */
	public function updatePassword(array $credentials)
	{
		$old_pass = $credentials['password_old'];
		$new_pass = $credentials['password'];
		$re_pass  = $credentials['password_confirm'];

		if (!password_verify($old_pass, $this->password))
			return ['Your old password is wrong. '];
		if ($new_pass != $re_pass)
			return ['Passwords do not match! '];

		$this->update([
			"password" => $new_pass,
		]);
	}

	/**
	 * Toggle whether a user is your friend.
	 *
	 * @param User $user
	 * @return void
	 */
	public static function toggleFriend(int $user_id, int $friend_id)
	{
		# Haal vriend op die jou als vriend ziet!
		$friend = User::select()
					->where('user.id', '=', $friend_id)
					->join('user_user', 'user.id', 'user_user.friend_id')
					->where('user_user.user_id', '=', $user_id)
					->get(1);

		if (count($friend) > 0)
			$results = Model::db()->query(
				"DELETE FROM user_user
				WHERE user_user.user_id = $user_id
				AND user_user.friend_id = $friend_id;"
			);
		else
			$results = Model::db()->query(
				"INSERT IGNORE INTO user_user
				(user_id, friend_id, is_accepted)
				VALUES ($user_id, $friend_id, 1);"
			);
	}

	/**
	 * User updating with password hashing.
	 */
	public function update(array $variables)
	{
		# Cleans and validates inputs
		self::validate($variables);

		return parent::update($variables);
	}

	/**
	 * User creation with password hashing.
	 */
	public static function create(array $variables)
	{
		self::validate($variables);

		$user = User::select()
					->where("email", "=", $variables['email'])
					->get();

		if (!empty($user))
			return $user;

		$conversation = Conversation::create([]);
		$variables['conversation_id'] = $conversation->id;

		# If no user is returned, create a new one
		return parent::create($variables);
	}

	/**
	 * Login, setting cookie.
	 */
	public static function login(array $credentials)
	{
		# User exists
		$user = User::select()
					->where("email", "=", $credentials['email'])
					->get();

		# Check password correct
		if (empty($user))
			return false;
		if (!password_verify($credentials["password"], $user->password))
			return false;

		# Start a session
		Session::start($user, $credentials);

		return true;
	}

	/**
	 * Logout, deleting cookie.
	 */
	public static function logout()
	{
		Session::end();
	}
}
