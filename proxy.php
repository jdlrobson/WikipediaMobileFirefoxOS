<?php # vim:ft=php:ts=2:sw=2:et:
/* Copyright (c) 2012, Patrick Reilly
* All Rights Reserved.
* For licensing information, see:
* https://github.com/preillyme/WikipediaMobileFirefoxOS
*/


$url = http_build_query( $_GET, '' );
$url = str_replace( 'api.php&', 'api.php?', $url );
$url = str_replace( 'url=', '', $url );
$url = str_replace( '%3A%2F%2F', '://', $url );
$url = str_replace( '%2Fw%2F', '/w/', $url );
$userAgent = 'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';
/* make sure that request has wikipedia.org/w/api.php in it not perfect but better than nothing */
if ( preg_match( "/\.wikipedia\.org\/w\/api\.php/i", $url ) ) {
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_USERAGENT, $userAgent );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	$data = curl_exec( $ch );
	curl_close( $ch );
	echo $data;
} else {
	echo 'Error requesting resource';
}
