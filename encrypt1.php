<?php
$key = '1234567891011120';
function encrypt($payload,$key) {
  $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
  $encrypted = openssl_encrypt($payload, 'aes-256-cbc', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}


function decrypt( $garble,$key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($garble), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}
// var_dump( explode('::',base64_decode(encrypt("1234567890123456","12345678901234561234567890123456","test")),2))."\n<br/>";
 // echo decrypt("S3hkKzJKdTUvVVNSeUlHZlZPbjBqdz09OjojdpJGNLiMJOmtzGU0r4px",$key)."\n<br/>";
?>