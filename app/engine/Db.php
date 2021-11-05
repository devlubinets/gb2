<?php

namespace app\engine;

use PDO;

class Db
{
    private PDO $pdo;
    private Db $instance;
    private string $dsn;
    private array $opt;
    private string $charset;
    private string $login;
    private string $password;
    private array $statements;

    private function __construct(string $host, string $dbname,string $charset, string $login, string $password)
    {
        # $dsn Имя источника данных или DSN, содержащее информацию,
        # необходимую для подключения к базе данных.
        # В общем, DSN состоит из имени драйвера PDO,
        # за которым следует двоеточие и специфический синтаксис подключения драйвера PDO

        $this->charset = $charset;
        $this->login = $login;
        $this->password = $password;

        $this->dsn = "mysql:dbname=$dbname;host=$host;charset=$this->charset";

        $this->opt = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }

    public function getInstanse()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function openConnection():void
    {
        $this->pdo = new PDO($this->dsn, $this->login, $this->password, $this->opt);
    }

    public function closeConnection():void
    {
        $this->db = null;
    }

    //Запрос к базе данных
    public function query(string $sql, array $params):string
    {
        #Подготовка запроса PDO
        $statement = $this->pdo->prepare($sql);
        #Выполнение запроса
        $statement->execute($params);

        #Вывод
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Запрос с переменными
//    public function prepareQuery(string $sql)
//    {
//        $sql
//    }

    public function getAll(string $table = '', string $sql = '', array $params = [])
    {
        return $this->query("SELECT * FROM $table" . $sql, $params);
    }

    public function getOne(string $table = '', string $sql = '', array $params = [])
    {
        $result =  $this->query("SELECT * FROM $table" . $sql, $params);
        return $result[0];
    }
    //Различные запросы к базам данным

    public function __sleep()
    {
        throw new \Exception("Cannot serialize Singleton");
        //TODO надо что-то с этим сделать, метод требует что-то возвращать
        return [];
    }

    private function __wakeup()
    {
        throw new \Exception("Cannot unserialize Singleton");
    }

    private function __clone()
    {
        throw new \Exception("Cannot clone Singleton");
    }
}