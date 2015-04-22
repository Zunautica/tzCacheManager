<?php

class CacheManController extends \Teadaze\TaskController {

	public function init(array $target) {
		$this->loadView('Cached');
		$this->getView()->setPath("site/cache/".implode('_', $target).".cache");
	}
}
