<?php
    spl_autoload_register(function ($class_name) {
        $absolutepath = __DIR__ . "/";
        $parts = explode('\\', $class_name);
        $class = $parts[count($parts)-1];
        $classes = array(
            $absolutepath ."app/controllers/" . $class. ".php",
             $absolutepath ."app/" . $class . ".php",
            $absolutepath ."app/models/" . $class . ".php",
            $absolutepath ."app/commands/" . $class . ".php",
            $absolutepath ."framework/" . $class . ".php",
            $absolutepath ."config/" . $class . ".php",
            $absolutepath ."tpl/" . $class . ".php"
        );
        foreach($classes as $class)
        {
            if(file_exists($class))
            {
                
                require_once $class;
            } 
        }
    });
?>