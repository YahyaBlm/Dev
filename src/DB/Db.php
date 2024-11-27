<?php

namespace App\Db;

use PDO;
use PDOException;

Class Db extends PDO
{
    //Instance unique de la classe
    private static $instance;

    //Infos de connexion
    private const DBHOST = 'myamajfyahyablm3.mysql.db';
    private const DBUSER = 'myamajfyahyablm3';
    private const DBPASS = 'ThaliePerrot10';
    private const DBNAME = 'myamajfyahyablm3';

    private function __construct()
    {
        //DSN de connexion
        $_dsn = 'mysql:dbname=' . self::DBNAME . ";host=" . self::DBHOST;

        //appeler le constructeur de la classe PDO
        try{
        parent::__construct($_dsn, self::DBUSER, self::DBPASS);
        
        $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf-8');
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public function getInstance():PDO
    {
        if(self::$instance === null) {
            self::$instance = new self(); // self::$instance = new instance
        }

        return self::$instance;
    }
}
