<?php
$key = md5("australia");
$salt = md5("australia");
function encrypt($string,$key){
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_CBC)));
	return $string;
}
// $key = md5("australia");
// $salt = md5("australia");
function decrypt($string,$key){
	$string = rtrim(base64_decode(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_CBC)));
	return $string;
}
