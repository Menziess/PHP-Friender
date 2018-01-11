<?php


class Route {

	private $_uri = [];

	public function add($uri) {
		$this->_uri[] = $uri;
	}

	public function submit() {

		echo '<br><br>';
		echo $uri = explode('/app', $_SERVER["REQUEST_URI"])[1];
		echo '<br><br>';

		foreach ($this->_uri as $key => $value) {
			if (preg_match("#^$value$#", $uri)) {
				echo 'match detected! - ' . $value;
			}
		}
	}
}