<?php

class Stylesheet extends BaseDom {
	public function __construct($href = FALSE, $innerHTML = '', $type = 'text/css', $media = NULL) {
		if ($innerHTML) { //internal styles
			parent::__construct('style', $innerHTML);
		} else { //link to stylesheet
			parent::__construct('link');
			$this['rel'] = 'stylesheet';
			$this['href'] = $href;
		}
		$this['type'] = $type;
		$this['media'] = $media;
	}
}
