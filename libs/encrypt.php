<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/2/16
 * Time: 8:06 AM
 */
class Encryption
{
    //const CIPHER = MCRYPT_RIJNDAEL_128; // Rijndael-128 is AES
    //const MODE   = MCRYPT_MODE_CBC;

    /* Cryptographic key of length 16, 24 or 32. NOT a password! */
    private $key;
    public function __construct($key) {
        $this->key = $key;
    }


    public function encrypt($plaintext)
    {
        $result='';
        for($i=0; $i<strlen($plaintext); $i++) {
            $char = substr($plaintext, $i, 1);
            $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result.=$char;
        }
        return $result = base64_encode($result);
    }
    
    public function decrypt($encrypttext){
        $result='';
        $string = base64_decode($encrypttext);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        
        return $result;
    }


    //for encoding variables in url
    public  function safe_b64encode($string) {

        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){

        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value){

        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

   /* public function aes128Encrypt( $data) {
        $dirty = array("+", "/", "=");
        $clean = array("_", "_", "_");
        if(16 !== strlen($this->key)) $this->key = hash('MD5', $this->key, true);
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        $encypted=base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
        return str_replace($dirty,$clean,$encypted);
    }

    public function aes128Decrypt( $data) {
        $dirty = array("+", "/", "=");
        $clean = array("_", "_", "_");
        $data = base64_decode(str_replace($clean, $dirty, $data));
        if(16 !== strlen($this->key)) $this->key = hash('MD5', $this->key, true);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }*/



}
