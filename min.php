<?php
// Autoload libraries
require_once __DIR__.'/vendor/autoload.php';

use tubalmartin\CssMin\Minifier as CSSmin;

$content = file_get_contents(__DIR__.'/test.css');
$compressor = new CSSmin;

$pcreRecursionLimit = ini_get('pcre.recursion_limit');
ini_set('pcre.recursion_limit', 1000);
$result = $compressor->run($content);
ini_set('pcre.recursion_limit', $pcreRecursionLimit);

file_put_contents(__DIR__.'/test.css.min', $result);