<?php

namespace app\src;

class Controller {

	/**
	 * Return view by name.
	 */
	public static function view(string $name, array $args = []) {

		# Present variables to view
		extract($args, EXTR_SKIP);

		# View file
		$view = __DIR__ . '/view/' . $name . '.php';

		if (!is_readable($view))
			throw new \Exception("View: $view not found.");
		require $view;
	}

	/**
	 * Returns json response.
	 */
	public static function json($object)
	{
		header('Content-Type: application/json');

		# Model objects toString method output json by default
		if ($object instanceof Model)
			print $object;
		else
			print json_encode($object);
	}

	/**
	 * For creating a new resource, use store method.
	 */
	public function postIndex()
	{
		$this->store();
	}

	/**
	 * Call the required method.
	 */
	public function handleRest(int $id)
	{
		switch (Request::$method) {
			case 'GET':
				$this->show($id);
				break;

			case 'POST':
				http_response_code(405);
				print "Wrong rest endpoint for creating new resource.";
				break;

			case 'PUT':
				$this->update($id);
				break;

			case 'DELETE':
				$this->delete($id);
				break;

			default:
				http_response_code(405);
				break;
		}
	}

	/**
	 * Get associated table for instantiated controller.
	 */
	private function getTableName()
	{
		$class = substr(strrchr(get_class($this), "\\"), 1);
		return __NAMESPACE__ . "\\model\\" . explode("Controller", $class)[0];
	}
}