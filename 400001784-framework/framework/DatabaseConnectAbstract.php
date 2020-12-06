<?php
namespace Framework;
abstract class DatabaseConnectAbstract
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $config;

    public abstract function createConnection();
    
}