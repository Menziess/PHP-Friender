<?php

namespace src;

class Controller {

	/**
	 * Return view by name.
	 */
	protected function view($name, $args = []) {

		extract($args, EXTR_SKIP);

		$view = __DIR__ . '/views/' . $name . '.php';

		if (!is_readable($view))
			throw new \Exception("View: $view not found.");
		require $view;
	}
}