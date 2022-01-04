<?php
function slug($text){
	$text = str_replace(' ', '-', $text);
	$text = preg_replace('/[^A-Za-z0-9\-]/', '', $text);
	$text = preg_replace('/-+/', '-', $text);
	$text = strtolower($text);
	return $text;
}
?>