<?php
$url = http_build_query($_GET, '');
$url = str_replace('api.php&', 'api.php?', $url);
$url = str_replace('url=', '', $url);
$url = str_replace('%3A%2F%2F', '://', $url);
$url = str_replace('%2Fw%2F', '/w/', $url);
$userAgent = 'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data;
