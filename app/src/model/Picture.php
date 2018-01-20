<?php

namespace app\src\model;

use app\src\Model;

class Picture extends Model {

	/**
	 * The attributes as columns in the database.
	 */
	public $id;
	public static $attributes = [
		"user_id",
		"model",
		"filename"
	];

	private static $dir = __DIR__ . "/../../uploads/";

	/**
	 * Create upload folder, if not exists.
	 */
	public static function createUploadFolder()
	{
		if (!file_exists(self::$dir)) {
			mkdir(self::$dir, 0777, true);
		}
	}

	/**
	 * Upload picture to storage and insert into database.
	 */
	public static function upload($file, $owner)
	{
		if (!isset($file))
			throw new \Exception("No file provided to upload. ");
		if (!isset($owner))
			throw new \Exception("No owner provided for upload. ");
		self::createUploadFolder();

		$errors = [];
		$file_name = $file['name'];
		$file_size = $file['size'];
		$file_tmp  = $file['tmp_name'];
		$file_type = $file['type'];

		$segments = explode('.', $file['name']);
		$file_ext = strtolower(end($segments));

		$expensions = ["jpeg", "jpg", "png"];

		if (!in_array($file_ext, $expensions)) {
			$errors[] = "extension not allowed, choose a JPEG or PNG file.";
		}

		if ($file_size > 500000) {
			$errors[] = 'Max file size is 5MB';
		}

		if (empty($errors)) {
			$file_name = uniqid("IMG_", true) . "." . $file_ext;
			move_uploaded_file($file_tmp, self::$dir . $file_name);
			echo "Success";
		} else {
			print_r($errors);
		}

		$picture = Picture::create([
			"user_id" => $owner->id,
			"model" => "user",
			"filename" => $file_name,
		]);

		$owner->update([
			"picture_id" => $picture->id,
		]);
	}
}
