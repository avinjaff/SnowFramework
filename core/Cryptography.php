<?php

class Cryptography {
    const SALT = 'MyVoiceIsMyPassport';
 
    public static function Hash($password) {
        return hash('sha512', self::SALT . $password);
    }
}

?>