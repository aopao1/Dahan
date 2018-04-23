<?php

/**
 * 漂亮打印
 * @param array $array
 */
function p ( array $array )
{
	echo "<pre>";
	print_r( $array );
	echo "</pre>";
}