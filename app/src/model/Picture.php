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

	private static $whitelistImages = ["jpeg", "jpg", "png"];
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
		$errors = [];
		self::createUploadFolder();

		if (!isset($file))
			$errors[] = "No file provided to upload.";
		if (!isset($owner))
			$errors[] = "No owner provided for upload.";

		$file_name = $file['name'];
		$file_size = $file['size'];
		$file_tmp  = $file['tmp_name'];
		$file_type = $file['type'];
		$segments = explode('.', $file['name']);
		$file_ext = strtolower(end($segments));

		# Check extension and filesize
		if (!in_array($file_ext, self::$whitelistImages))
			$errors[] = "Extension not allowed, choose a JPEG or PNG file.";
		if ($file_size > 500000)
			$errors[] = 'Max file size is 5MB';
		if (!empty($errors))
			return $errors;

		# If no errors have occured, upload file with hash as filename
		$file_name = uniqid("IMG_", true) . "." . $file_ext;
		move_uploaded_file($file_tmp, self::$dir . $file_name);

		# Create new picture
		if (file_exists(self::$dir . $file_name))
			return Picture::create([
				"user_id" => $owner->id,
				"model" => "user",
				"filename" => $file_name,
			]);
		else
			$errors[] = "File wasn't found in upload folder.";

		return $errors;
	}
}
