<?php 
	class Registry
	{
		private static $instance = null;
		private $session;
		private $validator = null;
		private $config = null;
		
		public static function instance(): self
		{
			if (is_null(self::$instance))
				self::$instance = new self();
			}
			return self::$instance;
		}
		public function getSession (): Session
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
				$this->validator = new Validator($this->config->get('rules'));
			}
		}
		return $this->validator;
		}
		public function doConfiguration (): Configurator
		{
			if (is_null($this->config))
			{
				$this->config = new Configurator();
			}
			return $this->config;
		}
}
?>
