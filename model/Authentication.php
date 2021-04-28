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
     * @return bool
     */
     public function getAuthentication($email, $password) {
           $query = $this->db_connection->prepare('SELECT * FROM users WHERE email = :email ');
           $query->bindParam(':email', $email, \PDO::PARAM_STR);
           //$query->bindParam(':pwd', $password, \PDO::PARAM_STR);
           $query->execute();
           //Password hashing tutorial : http://www.ibm.com/developerworks/library/wa-php-renewed_2/index.html
           //Password verify doc : http://php.net/manual/en/function.password-verify.php
           //Here, as the blog won't have a login, we won't use password_hash, only password verify to get the credentials from the database
           $queryRequest = $query->fetch(\PDO::FETCH_OBJ);

           if($queryRequest) {
               /*
               $query = $this->db_connection->prepare('SELECT * FROM user where email=:email');
               $query->bindParam(':email', $email, \PDO::PARAM_STR);
               $query->execute();
               $rows = $query->fetch(\PDO::FETCH_ASSOC);
               $id_user = $rows['id_user'];
               $_SESSION['id_user'] =  $id_user;
               */
              // $query = $this->db_connection->prepare('SELECT username FROM users WHERE email = :email');
               //$query->bindParam(':email', $email, \PDO::PARAM_STR);
               //$query->execute();
               //$username = $query->fetch(\PDO::FETCH_OBJ);

              // $_SESSION['username'] =  __toString($username);
               //return 1;
               $_SESSION['email'] = $queryRequest->email;
                $_SESSION['name'] = $queryRequest->name;
               $_SESSION['firstname'] = $queryRequest->firstname;
               $_SESSION['username'] = $queryRequest->username;
               $_SESSION['id_user'] = $queryRequest->id_user;
               $_SESSION['type_user'] = $queryRequest->statut;

               return 1;
               //return password_verify($password, $queryRequest->password);

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
