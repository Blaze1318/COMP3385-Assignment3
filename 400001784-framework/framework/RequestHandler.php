<?php
namespace Framework;
    class RequestHandler
    {
        private $routes;

        function __construct()
        {
            $this->routes = array();
        }
        public function  route(string $action,string $command):void
        {
            $action = trim($action,"/");
            if($action == null)
            {
                $action = "index";
            }
            $this->routes[$action] = array("command" => $command);
        }

        public function dispatch(string $action):void
        {
            $action = trim($action,"/");
             if($action == "400001784-public")
            {
                $action = "index";
            }
            $command = $this->routes[$action]["command"];
			$commandClass = new $command();
			$commandClass->execute(new CommandContext());
        }
    }
?>