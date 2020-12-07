<?php 
	class Registry
	{
		private static $instance = null;
		private $session;
		private $validator = null;
		private $dbconfig = null;
		
		public static function instance(): self
		{
			if (is_null(self::$instance))
				self::$instance = new self();
			}
			return self::$instance;
		}
		public function getSession (): SessionClass
		{
			if (is_null($this->session))
				$this->session = new SessionClass();
			}
			return $this->session;
		}

		// ...
		public function makeValidator (): Validator
		{
			if (is_null ($this->validator))
			{
				$this->validator = new Validator();
			}
		}
			return $this->validator;
		}
		public function doConfiguration (): array
		{
			if (is_null($this->config))
			{
				$config = parse_ini_file("../../400001784-framework/config/dbconfig.ini");
       		    $servername = $config["servername"];
                $username = $config["username"];
                $password = $config["password"];
                $dbname = $config["dbname"];
                $this->dbconfig = array("servername"=>$servername, "username"=>$username, "password"=>$password, "dbname"=>$dbname);
			}
			return $this->dbconfig;
		}
}
?>
