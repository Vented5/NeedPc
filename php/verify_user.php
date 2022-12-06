<?php
    /////// Encryption and verification D
    class pwd {
        const salt = 'CreamIsNeverEnough';
        public static function hash($password){
            return hash('sha256', self::salt . $password);
        }
        public static function verify($password, $hash){
            return ($hash == self::hash($password));
        }
    }

?>