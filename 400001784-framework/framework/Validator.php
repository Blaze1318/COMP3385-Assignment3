<?php
namespace Framework;
    class Validator
    {
        private static $instance = null;

        public function isNameValid($name):bool
        {
            if($name != null && $name != '')
            {
                return true;
            }
            return false;
        }
        public function validEmail($email):bool
        {
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                return false;
            }
            return true;
        }

        public function validPassword($password):bool
        {
            if(strlen($password) < 10)
            {
                return false;
            }elseif(!preg_match('/[A-Z]/', $password))
            {
               return false;
            }else if(!preg_match('/\d/',$password)){
                return false;
            }
            return true;
        }
        public function validRePassword($password,$repassword)
        {
            if($password == $repassword)
            {
                return true;
            }
            return false;
        }

        public static function getInstance():Validator {
            if(!self::$instance) {
                self::$instance = new Validator();
            }
    
            return self::$instance;
        }

    }
?>