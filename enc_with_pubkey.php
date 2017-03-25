<?php
$privkey = openssl_get_privatekey(file_get_contents('private.pem'));
$pubkey = openssl_get_publickey(file_get_contents('pubkey.pem'));

//this returns an array, we just take "key"
$readpub = (openssl_pkey_get_details($pubkey)) ;
//$readpub = $readpub["key"];
//var_dump($readpub);

$text = 'hey hello!';
$encrypted = '';
openssl_public_encrypt($text, $encrypted, $pubkey);
$out = $encrypted;

openssl_free_key($pubkey);

var_dump ($out);

?>
