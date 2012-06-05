<?php

/** Useful for appending to some other node.
 * @param $varargs (mixed, var-args) Any number of HTML snippets.
 * @return (string) Returns a parent-less HTML string. Example usage:<pre>
 * $html = Tag(
 *  &nbsp; "To return home, click ",
 *  &nbsp; Tag::a('here')->href('/home/index.php'),
 *  &nbsp; "."
 * );
 * echo Tag::p($html);//&lt;p&gt;To return home, click &lt;a href="/home/index.php"&gt;here&lt;/a&gt;.&lt;p&gt;
 * </pre>
 */
function Tag($varargs = '') {
	return join('', func_get_args());
}

/**
 * "Tag Builder" helper class.
 * Similar to the "genshi.tag" magic (by Edgewall).
 * @author Ethan
 */
class Tag extends BaseDom {

	public static function __callStatic($name, $arguments) {
		$innerHtml = array_shift($arguments);
		$attributes = array_shift($arguments);
		$dom = new Tag($name, $innerHtml, $attributes);
		return $dom;
	}
	
	public function __call($name, $arguments) {
		$key = rtrim($name, '_'); //in case the method is a keyword, append an underscore (e.g. "class_").
		$attribute = array_shift($arguments);
		$this->attributes[$key] = $attribute;
		return $this;
	}
}
