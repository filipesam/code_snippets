<?php
$privkey = openssl_get_privatekey(file_get_contents('private.pem'));
$pubkey = openssl_get_publickey(file_get_contents('pubkey.pem'));

//this returns an array, we just take "key"
$readpub = (openssl_pkey_get_details($pubkey)) ;
//$readpub = $readpub["key"];
//var_dump($readpub);

//$text = 'hey hello!';
$text = file_get_contents('msgfile.txt');
$encrypted = '';
openssl_public_encrypt($text, $encrypted, $pubkey);
$outenc = $encrypted;

file_put_contents('msgfile_enc_php.txt', $outenc);


openssl_free_key($pubkey);

//var_dump ($outenc);
//echo "\n --------- ";
///

$enc_data = $outenc;
$decrypted = '';
openssl_private_decrypt($enc_data, $decrypted, $privkey);
$output = $decrypted;

openssl_free_key($privkey);
var_dump ($output);

echo "\nDecrypted: \n" . $output . "\n"; 


?>
