<?php

class Anchor extends BaseDom {
	public function __construct($href = FALSE, $innerHTML = '', $name = FALSE) {
		parent::__construct('a', $innerHTML);
		$this['href'] = $href;
		$this['name'] = $name;
	}
}

