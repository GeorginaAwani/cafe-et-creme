<?php
$string = 'search=hhhey&oh=1';
$query = [];

$pairs = explode('&', $string);

foreach ($pairs as $pair) {
	$separator = strpos($pair, '=');
	$key = substr($pair, 0, $separator);
	$value = substr($pair, ($separator + 1));
	$query[$value] = $value;
}


print_r($query);
