php-dom
=======

Contents:
* DOM modeling classes.
* Includes a "tag-builder" helper class.

Examples:
```php
require_once('dom/bootstrap.php');
...

$html = Tag(
   "To return home, click ",
   Tag::a('here')->href('/home/index.php'),
   "."
);

echo Tag::p($html); //<p>To return home, click <a href="/home/index.php">here</a>.</p>
```

License
=======
http://eib.mit-license.org/
