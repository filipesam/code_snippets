# code_snippets

These are just a few random code snippets to test stuff with RSA encryption.

I know i have a private.pem key in git, =D it's on purpose it's to test some stuff

## generate the RSA private keys to play with
### This will generate a private key with 1024 bits (without password don't use this in production!)
```bash
openssl genrsa -out private.pem 1024
```

### generate the RSA public key from the previous private key
```bash
openssl rsa -in private.pem -outform PEM -pubout -out pubkey.pem
```

### Now we can test stuff with ***openssl***
### encrypt the msgfile.txt with the pubkey.pem
```bash
openssl rsautl -encrypt -in msgfile.txt -pubin -inkey pubkey.pem -out ciphered.txt
```
### check it out with ***xxd***
```bash
xxd ciphered.txt
```

### decrypt with ***openssl***
```bash
openssl rsautl -decrypt -in ciphered.txt -inkey private.pem -out decrypted.txt
```

### This does not work with big files, RSA 'public-key' crypto is not made for encrypting files. Do to that use a Symmetric cipher like AES. Or use openssl smime:
```bash
openssl req -x509 -nodes -days 100000 -newkey rsa:2048  -keyout privatekey.pem  -out pubkey.pem  -subj ‘/’

openssl smime -encrypt -aes256 -in big_msgfile.txt -binary -outform DEM -out big_msgfile_encrypted.txt pubkey.pem
```

The rest of the files are tests with ***php*** and ***python***
