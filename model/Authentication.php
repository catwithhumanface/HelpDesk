<?php

namespace BlogPHP\Model;

use BlogPHP\App\Model;

/**
 * Class Authentication
 * @package BlogPHP\Model
 */
class Authentication {
   protected $db_connection;

    /**
     * Authentication constructor.
     */

   public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }
    /**
     * Authentication process
     * @param $username
     * @param $password
     * @param $type_user
     * @param $username
     * @return bool
     */
    public function join($email, $password, $type_user, $username) {
        $query = $this->db_connection->prepare('INSERT INTO users (email, username, password, type_user)
                                                VALUES (:email, :username, :password, :typeu)');
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->bindParam(':username', $username, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->bindParam(':typeu', $type_user, \PDO::PARAM_STR);
        return $query->execute();
    }

    /**
     * Authentication process
     * @param $username
     * @param $password
     * @return bool
     */
    public function getAuthentication($email, $password) {
        $query = $this->db_connection->prepare('SELECT * from users where email=:email and password=:password');
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_OBJ);
        if(empty($result)) {
            return false;
        }else{
            $query = $this->db_connection->prepare('SELECT username from users where email=:email');
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchColumn();
            $_SESSION['username']=$result;

            $query = $this->db_connection->prepare('SELECT id_user from users where email=:email');
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchColumn();
            $result = (int)$result;
            $_SESSION['id_user']=$result;

            $query = $this->db_connection->prepare('SELECT type_user from users where email=:email');
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchColumn();
            $result = $result;
            $_SESSION['type_user']=$result;

            return true;
        }
    }
    /**
     * Authentication process
     * @param $username
     * @param $password
     * @return bool
     */
    public function checkEmail($email) {
        $query = $this->db_connection->prepare('SELECT email FROM users WHERE email = :email ');
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_OBJ);
        if(empty($result)) {
            return true;
        }else{
            return false;
        }
    }


    /**
     * Changing password authentication
     * @param $password
     * @return bool
     */
    public function setAuthentication($password) {
        $query = $this->db_connection->prepare('UPDATE users SET password=:password LIMIT 1');
        $newPassword = password_hash($password , PASSWORD_DEFAULT);
        $query->bindParam(':password', $newPassword);
        return $query->execute();
    }

}
