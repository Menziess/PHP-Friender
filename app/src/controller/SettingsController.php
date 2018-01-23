<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Picture;

class SettingsController extends Controller {

	/**
	 * User settings page.
	 */
	public function getSettings()
	{
		$user = User::auth();

		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		return self::view("settings", compact("picture"));
	}

	/**
	 * Updates settings.
	 */
	public function postSettings()
	{

		$user = User::auth();
		$vars = Request::$post;

		// dit werkt niet
		$file = Request::$files['image'];

		if(!empty($file)) {
			$upload = Picture::upload($file, $user);

			if (!$upload instanceof Picture)
				return self::redirect('/settings', [
					'errors' => $upload,
				]);

			$user->update([
				"picture_id" => $upload->id,
			]);
		} else {
			$user->update($vars);
		}
		return self::redirect('/settings', compact("user"));
	}
}

// if(isset($_POST['re_password']))
// {
// 	$old_pass=$_POST['old_pass'];
// 	$new_pass=$_POST['new_pass'];
// 	$re_pass=$_POST['re_pass'];
// 	$chg_pwd=mysql_query("select * from users where id='1'");
// 	$chg_pwd1=mysql_fetch_array($chg_pwd);
// 	$data_pwd=$chg_pwd1['password'];
// 	if($data_pwd==$old_pass)
// 	{
// 		if($new_pass==$re_pass){
// 			$update_pwd=mysql_query("update users set password='$new_pass' where id='1'");
// 			echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
// 		}
// 		else{
// 			echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
// 		}
// 	}
// 	else
// 	{
// 	echo "<script>alert('Your old password is wrong'); window.location='index.php'</script>";
// 	}
// }
