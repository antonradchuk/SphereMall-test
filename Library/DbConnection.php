<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 00:24
 */

namespace Library;


class DbConnection
{
    private static $instance;
    private $pdo;

    private function __construct()
    {

        $dsn = 'mysql: host=' . Config::get('db_host') . '; dbname='. Config::get('db_name');
        $this->pdo = new \PDO($dsn, Config::get('db_user'), Config::get('db_pass'));
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }
    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

}