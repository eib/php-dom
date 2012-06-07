<?php

class BaseDom implements ArrayAccess {
	protected $tag;
	protected $innerHTML;
	protected $is_self_closing;
	protected $attributes = array(); //delegate for ArrayAccess methods
	
	//TODO: support for different doctypes: self-closing elements, which elements don't need to close, etc.
	private static $self_closing_tags = array('area', 'base', 'basefont', 'br', 'hr', 'input', 'img', 'link', 'meta');
	
	protected function __construct($tag_name, $innerHTML = '', $attributes = array()) {
		$this->tag = $tag_name;
		$this->innerHTML = $innerHTML;
		$this->attributes = $attributes;
		$this->is_self_closing = in_array($tag_name, BaseDom::$self_closing_tags);
	}
	
	public function toHTML() {
		$html_attributes = array();
		if ($this->attributes) {
			foreach ($this->attributes as $name => $value) {
				$html_attributes[] = " $name=\"$value\"";
			}
		}
		if ($this->is_self_closing) {
			return "<{$this->tag}" . join('', $html_attributes) . " />"; //no innerHTML
		} else {
			return "<{$this->tag}" . join('', $html_attributes) . ">{$this->innerHTML}</{$this->tag}>";
		}
	}
	
	public function setSelfClosing($is_self_closing = TRUE) {
		$this->is_self_closing = $is_self_closing;
	}
	
	public function __toString() {
		return $this->toHTML();
	}
	
	/* ArrayAccess methods */
	
	public function offsetExists($index) {
		return isset($this->attributes[$index]);
	}
	public function offsetGet($index) {
		return $this->offsetExists($index) ? $this->attributes[$index] : NULL;
	}
	public function offsetUnset($index) {
		if ($this->offsetExists($index)) {
			unset($this->attributes[$index]);
		}
	}
	public function offsetSet($index, $value) {
		if ($value) {
			$this->attributes[$index] = $value;
		} else {
			$this->offsetUnset($index); //Note: removes attributes when "value" is "false".
		}
	}
	
	/* Static "construction" */
	
	public static function factory($tag_name, $innerHTML = '', $attributes = array()) {
		$dom = new BaseDom($tag_name, $innerHTML, $attributes);
		return $dom;
	}
	
}
