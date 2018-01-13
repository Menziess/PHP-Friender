<?php

namespace app\src;

class Controller {

	/**
	 * Return view by name.
	 */
	protected function view($name, $args = []) {

		extract($args, EXTR_SKIP);

		$view = __DIR__ . '/view/' . $name . '.php';

		if (!is_readable($view))
			throw new \Exception("View: $view not found.");
		require $view;
	}
}