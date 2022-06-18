<?php

namespace Source\Core;

use PDO;
use PDOException;

class Connect 
{
    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "fullstackphp";
    private const PASSWD = "";
    
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL//garante uso mesmo nome de colun bd 
    ];
    
    //Armazena o obj PDO. Garante que não tenha duas conexão por usuário
    private static $instance; 
    
    /**
     * @return PDO
     */
    public static function getInstance(): PDO 
    {//Garante q exista somente um obj e uma conexão por usuário
        if(empty(self::$instance)){
            try{
                self::$instance = new PDO(
                     "mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                     CONF_DB_USER,
                     CONF_DB_PASS,
                     self::OPTIONS
                );
            } catch (PDOException $exception) {
                //var_dump($exception);
                //Trava o código e apresenta msn de erro
                die("<h1>Whoops! Erro ao conectar...</h1>");
            }
        }
        return self::$instance;
    }
    
    final protected function __construct() 
    {   
    }
    
    final protected function __clone() 
    {      
    }
}
