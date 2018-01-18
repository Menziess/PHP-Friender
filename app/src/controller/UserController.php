<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Router;
use app\src\Controller;
use app\src\Model;
use app\src\model\User;

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
	 * Saves new user.
	 */
	public function store()
	{
		# User maken
		$user = User::create(Request::$post);
		$id = $user->id;

		return self::view('user', compact("user", "id"));
	}

	/**
	 * Deletes user.
	 */
	public function delete(int $id)
	{
		$deleted = User::delete($id);

		echo "User deleted: ";
		echo $deleted ? "True" : "False";
	}

	/**
	 * Updates user. @todo Stefan
	 */
	public function update(int $id)
	{
		$user = User::find($id);

		$user->update(Request::$put);

		if ($user)
			return $user;
	}

	/**
	 * User settings page.
	 */
	public function getSettings()
	{
		# User auth methode zorgt dat alleen geauthenticeerde users
		# hun eigen prive routes kunnen bezoeken
		User::auth();

		return self::view("settings");
	}

	/**
	 * Updates settings.
	 *
	 * @todo Roos (Samen even naar kijken)
	 */
	public function postSetting()
	{
		// User::auth();

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

			$expensions = ["jpeg","jpg","png"];

			if(in_array($file_ext,$expensions)=== false){
			   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}

			if($file_size > 500000){
			   $errors[]='Max file size is 5MB';
			}

			if(empty($errors)==true){
			   move_uploaded_file($file_tmp,"../../../uploads/".$file_name);
			   echo "Success";
			}else{
			   print_r($errors);
			}
		 }
	}
}
