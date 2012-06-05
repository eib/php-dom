<?php

class Script extends BaseDom {
	public function __construct($src = FALSE, $innerHTML = FALSE, $type = 'text/javascript') {
  		parent::__construct('script', $innerHTML);
  		$this['type'] = $type;
  		$this['src'] = $src;
	}
}
