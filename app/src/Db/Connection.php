<?php

namespace Db;

use PDO;

class Connection {
    protected $host = 'db:3306';
    protected $dbname = 'idealista';
    protected $username = 'root';
    protected $password = 'superSecr3t';
    protected $db = null;
    protected static $instance = null;

    public function __construct()
    {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    }

    /**
     * Retrieves an array of the used Entity
     * @param string $sql
     * @param string $className
     * @return array[Entity]
     */
    public function get(string $sql, string $className)
    {
        $stmt = $this->db->query($sql, PDO::FETCH_CLASS, $className);
        return $stmt->fetchAll();
    }

    /** Executes the sql and returns the numbers of rows affected
     * @param  string $sql
     * @return int
     */
    public function executeSql(string $sql)
    {
        return $this->db->exec($sql);
    }

    /**
     * Limit the connections created to one
     * @return Connection|null
     */
    public static function getInstance() : ?Connection
    {
        if (self::$instance == null) self::$instance = new self();

        return self::$instance;
    }
}
