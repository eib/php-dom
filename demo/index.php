<?php

require_once('../dom/bootstrap.php');

echo Tag::p('There are three main pieces to the "Tag Builder" set of helpers:');
echo Tag::ul(Tag(
		Tag::li('1) A function named "Tag".'),
		Tag::li('2) (magic) static methods on the "Tag" class.'),
		Tag::li('3) (magic) instance methods on "Tag" objects.')
	));
?>

<pre>
// 1) The "Tag" function string-concatenates all its arguments
// It can be used to join peer elements (like "li" or "p").
$list_items = Tag(
	// 2) Any static method called on the "Tag" class will create an X/HTML element with that name (case-sensitive).
	// The first argument contains the inner-HTML of the element:
	Tag::li('Hello'),
	// The (optional) second argument may be an associative array of attributes, like so:
	Tag::li('World', array('style' =&gt; 'font-style:italic;font-weight:bold'))
);

// 3) Additionally, instance methods called on a "Tag" object will create an attribute by that name.
// The first argument is the attribute value.
// Instance methods can be chained.
$ul = Tag::ul($list_items)-&gt;id('hello_world')-&gt;class('salutations');

// Calling __toString on a "Tag" instance will perform X/HTML formatting of the element,
// its attributes, and the inner-HTML: 
echo $ul;
</pre>

<p>The end result is:</p>

<?php
echo htmlentities('<ul id="hello_world" class="salutations"><li>Hello</li><li style="font-style:italic;font-weight:bold">World</li></ul>');
?>

<p>Which renders like so:</p>
<?php
// The "Tag" function string-concatenates all its arguments
// It can be used to join peer elements (like "li" or "p").
$list_items = Tag(
		
		// Any static method called on the "Tag" class will create an X/HTML element with that name (case-sensitive).
		// The first argument contains the inner-HTML of the element:
		Tag::li('Hello'),
		// The (optional) second argument may be an associative array of attributes, like so:
		Tag::li('World', array('style' => 'font-style:italic;font-weight:bold'))
		);

// Additionally, instance methods called on a "Tag" object will create an attribute by that name.
// The first argument is the attribute value.
// Instance methods can be chained.
$ul = Tag::ul($list_items)->id('hello_world')->class('salutations');

// Calling __toString on a "Tag" instance will perform X/HTML formatting of the element,
// its attributes, and the inner-HTML: 
echo $ul;

