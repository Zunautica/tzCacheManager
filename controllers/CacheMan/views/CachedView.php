<?php

class CachedView extends \Teadaze\View {

	private $path;

	public function init() {

	}
	
	public function loadTemplate()
	{
		return file_get_contents($this->path);
	}

	public function setPath($cache) {
		$this->path = $cache;
	}
}
