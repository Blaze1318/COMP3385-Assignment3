<?php
	use Framework\DomainObject;
	class UsersObject implements DomainObject {
        private $usersName;
        private $usersEmail;
        private $usersPassword;

        function __construct($un, $ue, $up) {
            $this->usersName = $un;
            $this->usersEmail = $ue;
            $this->usersPassword = $up;
        }

        public function getName() {
            return $this->usersName;
        }

        public function getEmail() {
            return $this->usersEmail;
        }

        public function getPass() {
            return $this->usersPassword;
        }
    }
?>