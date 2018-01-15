<?php

namespace app\src;

class Controller {

	/**
	 * Return view by name.
	 */
	public function view(string $name, array $args = []) {

		extract($args, EXTR_SKIP);

		$view = __DIR__ . '/view/' . $name . '.php';

		if (!is_readable($view))
			throw new \Exception("View: $view not found.");
		require $view;
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
	 * Get associated table for controller.
	 */
	private function getTableName()
	{
		$class = substr(strrchr(get_class($this), "\\"), 1);
		return __NAMESPACE__ . "\\model\\" . explode("Controller", $class)[0];
	}
}