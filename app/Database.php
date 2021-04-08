<?php

namespace BlogPHP\App;

/**
 * Class Database Containing the Database informations
 * @package BlogPHP\App
 */
class Database extends \PDO{

    /**
     * Database constructor.
     */
    public function __construct() {

		//Change these values to your own database.
		$_MYSQL_DB = 'helpdesk';
		$_MYSQL_HOST = 'localhost';
		$_MYSQL_USER = 'root';
		$_MYSQL_PW = 'root';

		define('MYSQL_DB', $_MYSQL_DB);
		define('MYSQL_HOST', $_MYSQL_HOST);
		define('MYSQL_USER', $_MYSQL_USER);
		define('MYSQL_PW', $_MYSQL_PW);

		$dsn = 'mysql:dbname=' . MYSQL_DB . ';host=' . MYSQL_HOST;
		$user = MYSQL_USER;
		$pw = MYSQL_PW;

		try {
			parent::__construct($dsn, $user, $pw);
			$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}

}
