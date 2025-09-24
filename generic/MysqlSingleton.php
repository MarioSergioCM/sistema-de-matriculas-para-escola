<?php

namespace generic;

use PDO;
use PDOException;
use Exception;


class MysqlSingleton {

    private static $instance = null;

    private $dsn = null;
    private $username = null;
    private $password = null;
    private $dbname = null;
    private $pdo =null;
    private $options = null;


    private function __construct(){
        $this->dsn = "127.0.0.1";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "escola";

        $this->options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT         => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];   
           
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new MysqlSingleton();
        }

    return self::$instance;
    }

    public function connect(){

        if ($this->pdo) {
            return $this->pdo;
            echo "ja esxiste conexao ativa";
        }

        try {        
            $this->pdo = new PDO("mysql:host={$this->dsn};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);

            echo "Conexao Sucesso---->";
        } catch (PDOException $e) {            
            echo "Conexao Erro---->" . $e->getMessage();
        }

    return $this->pdo;
    }

    public function query($sql){

        if ($this->pdo == null) {
            $this->pdo = $this->connect();
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultado =  $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultado as $row) {
                echo "<br>" . $row["Nome"] . "<br>";
                echo $row["Idade"] . "<br>";
            }
        

        } catch (PDOException $e) {
            echo "Query Error: ---> ". $e->getMessage();
            return false;
        }
    }

}


