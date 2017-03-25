#!/usr/bin/python
from Crypto.PublicKey import RSA
k = open('pubkey.pem', 'r')
pubkey = RSA.importKey(k.read())

# read file
f = open('msgfile.txt','r')
#encrypt file
filecontent = f.read()
print filecontent
print 'Can we encrypt with this key?: ' , pubkey.can_encrypt()
print 'This is the file encrypted:\n' + '_'*30
enc_data = pubkey.encrypt(filecontent,32)
e = open('msgfile_enc_with_py.txt','wb')
e.write(str(enc_data))
e.close()
e = open('msgfile_enc_with_py.txt','r')
garbage = e.read()
print garbage
e.close()
