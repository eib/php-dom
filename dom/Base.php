<?php

class Base extends BaseDom {
	public function __construct($href) {
		parent::__construct('base');
		$this['href'] = $href;
	}
}
