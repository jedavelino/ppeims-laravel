<?php

/**
 * [_beautifyName description]
 * @param  string $name [description]
 * @return string       [description]
 */
function prettyName($name) 
{
	$name = explode(';', $name);
	return $name[0] . ', ' . $name[1] . ' ' . $name[2];
}

function _getNameByIndex($name, $index) 
{
	$name = explode(';', $name);

	// return $name[0] . ', ' . $name[1] . ' ' . $name[2];
	return $name[$index];
}

function _prettyDate($date) 
{
	return $date->format('F j, Y');
}