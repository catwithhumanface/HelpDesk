<?php


namespace BlogPHP\App;


abstract class Model
{
    protected $db_connection;

    public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }
}