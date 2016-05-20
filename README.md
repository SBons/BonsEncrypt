# BonsEncrypt
PHP based Number encrypt and decrypt plugin, it can encrypt number to number and alphabets


###Number Encryption
```
$enc = new BonsEncrypt();

$toEncVal = 123564;
$outputLength = 9;

echo "Value:".$encyptedVal."<br/>";

$encyptedVal = $enc->encryptAsNumber($toEncVal,$outputLength);
echo "Encrypted Value:".$encyptedVal."<br/>";

$decryptedVal = $enc->decryptNumber($encyptedVal);
echo "Decrypted Value:".$decryptedVal."<br/>";
```

###Alphabets Encryption
```
$enc = new BonsEncrypt();

$toEncVal = 123564;
$outputLength = 9;

echo "Value:".$encyptedVal."<br/>";

$encyptedVal = $enc->encryptAsAlphabets($toEncVal,$outputLength);
echo "Encrypted Value:".$encyptedVal."<br/>";

$decryptedVal = $enc->decryptAlphabets($encyptedVal);
echo "Decrypted Value:".$decryptedVal."<br/>";
```
