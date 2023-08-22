<?php

class Database
{
    protected $connection;

    /**
     *  Подключаемся к бд
     */
    public function __construct()
    {
        $config = require_once 'config/config_db.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->connection = new PDO($dsn, $config['user'], $config['password'], [
            // если что-то не так, получем ошибку
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]);
    }

    /**
     * @param $sql
     * @param array $params
     * @return PDOStatement
     */
    public function query($sql, array $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        if (!empty($params))
            foreach ($params as $key => $value){
                if (is_int($value))
                    $type = PDO::PARAM_INT;
                else
                    $type = PDO::PARAM_STR;
                    $stmt->bindValue(':' . $key, $value, $type); 
            }
        $stmt->execute();

        return $stmt;
    }

    /**
     * @param $sql
     * @return array|false
     */
    public function read($sql)
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
