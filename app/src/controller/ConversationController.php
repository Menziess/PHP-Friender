<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Message;
use app\src\model\Conversation;

class ConversationController extends Controller {

	/**
	 * Update event messages.
	 */
	public function update(int $id)
	{
		$auth = User::auth();

		$message = Message::create([
			"user_id" => $auth->id,
			"message" => Request::$put['message'],
			"conversation_id" => $id
		]);

		$message = Conversation::message($message->id);

		return self::json($message);
	}
}