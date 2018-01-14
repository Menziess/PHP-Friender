<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\Model;

class UserController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		$users = User::all();

		return self::view('user', compact("users"));
	}

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		if ($id)
			$user = User::find($id);

		return self::view('user', compact("user", "id"));
	}

	/**
	 * @todo Roos
	 */
	public function store()
	{
		// header('Content-Type: application/json');
		// http_response_code(501);
		// echo json_encode(Request::$post);
	}

	/**
	 * @todo Sarah
	 */
	public function delete(int $id)
	{
		// header('Content-Type: application/json');
		// http_response_code(501);
		// echo json_encode([
		// 	"not" => "implemented!"
		// ]);
	}

	/**
	 * @todo Jochem
	 */
	public function update(int $id)
	{
		// header('Content-Type: application/json');
		// http_response_code(501);
		// echo json_encode(Request::$put);
	}

	/**
	 *  @todo Stefan
	 */
	public function getDemo1()
	{
		# Request
		Request::$post;

		# User maken
		$user = new User([
			"first_name" => "Stefan",
			"last_name" => "Schenk",
			"date_of_birth" => "2018-01-09",
			"email" => "stefan_schenk@hotmail.com",
			"password" => "test123",
			"password_check" => "test123",
		]);

		# Opslaan in database
		$success = $user->create();

		# User properties benaderen
		echo "User  $user->first_name was created: ";
		echo ($success) ? 'True' : 'False';
	}

	/**
	 * @todo Stefan
	 */
	public function getDemo2()
	{
		# Raw SQL query
		$model = new Model();
		$users = $model->query("SELECT * FROM user ORDER BY id");

		# Api-achtige output
		echo json_encode($users);
	}
}