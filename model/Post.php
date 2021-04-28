<?php

namespace BlogPHP\Model;

use BlogPHP\App\Model;

/**
 * Class Post
 * @package BlogPHP\Model
 */
class Post {
	
	protected $db_connection;

    /**
     * Post constructor.
     */

    public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }

    /**
     * Allowing the possibility to show only a specific set of posts in a certain range from $startLimit to $endLimit
     * @param int $startLimit
     * @param int $endLimit
     * @param string $category
     * @return array
     */
    public function get($startLimit, $endLimit, $category) {
		//Preparing the query 
        $query = $this->db_connection->prepare('SELECT * FROM ticket ORDER BY creation_date DESC LIMIT :startLimitRange, :endLimitRange');
		//Both of the ranges given through the bindParam() method, using the PDO::PARAM_INT
        $query->bindParam(':startLimitRange', $startLimit, \PDO::PARAM_INT);
        $query->bindParam(':endLimitRange', $endLimit, \PDO::PARAM_INT);
        $query->execute();
        $rowsToReturn = $query->fetchAll(\PDO::FETCH_OBJ);

        $query = $this->db_connection->prepare('SELECT * FROM ticket');
        $query->execute();
        $rows = $query->fetchAll(\PDO::FETCH_ASSOC);
        $totalCount = sizeof($rows);
        $_SESSION['totalCount'] = $totalCount;
        $_SESSION['tickets_per_page'] = $endLimit;
        //filtrer category
        if($category!=="all"){
            $query = $this->db_connection->prepare('SELECT * FROM ticket where category = :category');
            $query->bindParam(':category', $category, \PDO::PARAM_STR);
            $query->execute();
            $rowsToReturn = $query->fetchAll(\PDO::FETCH_OBJ);
        }
		//Return the results
        // using FETCH_OBJ
			// More information about the different possibilities of fetching results : http://php.net/manual/en/pdostatement.fetch.php
        return $rowsToReturn;
    }

    /**
     * Get all posts
     * @return array
     */
    public function getAll() {
        $query = $this->db_connection->query('SELECT * FROM ticket ORDER BY creation_date DESC');
        //$query = $this->db_connection->query('SELECT * FROM posts ORDER BY date DESC');
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Get a post by it's ID
     * @param int $id
     * @return mixed
     */
    public function getById($id) {
		//Normally we wouldn't be using LIMIT here, as the ID is unique anyways. But it's better to have several check ups to have exactly what we need.
        $query = $this->db_connection->prepare('SELECT * FROM ticket WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch(\PDO::FETCH_OBJ);

        $query = $this->db_connection->prepare('SELECT id_user FROM ticket WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        $id_userObj = $query->fetch(\PDO::FETCH_ASSOC);
        $id_userStr = implode($id_userObj);

        $query = $this->db_connection->prepare('SELECT username FROM users WHERE id_user = :postId LIMIT 1');
        $query->bindParam(':postId', $id_userStr, \PDO::PARAM_INT);
        $query->execute();
        $usernameObj = $query->fetch(\PDO::FETCH_ASSOC);
        $usernameStr = implode($usernameObj);
        $_SESSION['post_username'] = $usernameStr ;

        $query = $this->db_connection->prepare('SELECT count(id_reponse) FROM reponse WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        $countReponse = $query->fetch(\PDO::FETCH_ASSOC);
        $countReponseInt = implode($countReponse);
        $_SESSION['countReponse'] = $countReponseInt ;

        return $row;
    }
    /**
     * Get a post by it's ID
     * @param int $id
     * @return mixed
     */
    public function getReponse($id) {
        //Normally we wouldn't be using LIMIT here, as the ID is unique anyways. But it's better to have several check ups to have exactly what we need.
        $query = $this->db_connection->prepare('SELECT * FROM reponse WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        $rowsToReturn = $query->fetchAll(\PDO::FETCH_OBJ);
        return $rowsToReturn;
    }

    /**
     * Add a post
     * @param array $queryData
     * @return bool
     */
    public function add(array $queryData) {
        $id_user= (int)$_SESSION['id_user'];
        $query = $this->db_connection->prepare('INSERT INTO ticket (title, content, category, id_user) VALUES(:title, :content, :category, '.$id_user.')');
        //$query = $this->db_connection->prepare('INSERT INTO posts (title, small_desc, content, author) VALUES(:title, :small_desc, :content, :author)');
        $query->bindValue(':title', $queryData['title']);
        $query->bindValue(':category', $queryData['category']);
        $query->bindValue(':content', $queryData['content']);
		return $query->execute($queryData);
    }
    /**
     * Add a post
     * @param string $content
     * @return bool
     */
    public function addReponse($id, $content) {
        $id_user= (int)$_SESSION['id_user'];
        $query = $this->db_connection->prepare('INSERT INTO reponse (content, id_user, id) VALUES(:content, '.$id_user.', '.$id.')');
        //$query = $this->db_connection->prepare('INSERT INTO posts (title, small_desc, content, author) VALUES(:title, :small_desc, :content, :author)');
        $query->bindParam(':content', $content, \PDO::PARAM_STR);
        return $query->execute();

    }

    /**
     * Updating an existing post by passing as a parametre the data as an array
     * @param array $data
     * @return bool
     */
    public function update(array $data) {
        $query = $this->db_connection->prepare('UPDATE ticket SET title=:title, category=:category, content=:content, creation_date=NOW() WHERE id = :postId LIMIT 1');
        $query->bindValue(':postId', $data['postId'], \PDO::PARAM_INT);
        $query->bindValue(':title', $data['title']);
        $query->bindValue(':category', $data['category']);
        $query->bindValue(':content', $data['content']);
        return $query->execute();
    }

    /**
     * Delete a post
     * @param int $id
     * @return bool
     */
    public function delete($id) {
		//Here the use of LIMIT is optional as well, but just in case something goes wrong, we use it to make sure nothing else is deleted.
        $query = $this->db_connection->prepare('DELETE FROM ticket WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();
    }

    /**
     * Delete a post
     * @param int $id
     * @return bool
     */
    public function fermer($id) {
        //Here the use of LIMIT is optional as well, but just in case something goes wrong, we use it to make sure nothing else is deleted.
        $query = $this->db_connection->prepare('UPDATE ticket SET statusT="Clos" WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();
    }

    /**
     * @param string $category
     * @return string
     */
    public function analyse($category)
    {

        $month = " ";
        $num = " ";
        if($category=="P%"){
            $categoryFullname="Pédagogique";
        }else if($category=="A%"){
            $categoryFullname="Administratif";
        }else{
            $categoryFullname="Etc";
        }
            $query = $this->db_connection->prepare('SELECT date_format(creation_date, "%Y-%m-%d") as date 
                                                        FROM ticket where category like :category group by creation_date');
            $query->bindParam(':category', $category, \PDO::PARAM_STR);
            $query->execute();
            $rows = $query->fetchAll(\PDO::FETCH_ASSOC);
            $totalCount = sizeof($rows);
            if ($totalCount > 0) {
                for ($i = 0; $i < $totalCount; $i++) {
                    $month .= '"' . implode($rows[$i]) . '",';
                }
                $month = substr($month, 0, -1);
            }
            $query = $this->db_connection->prepare('SELECT count(id)  FROM ticket where category like :category  group by creation_date');
            $query->bindParam(':category', $category, \PDO::PARAM_STR);
            $query->execute();
            $rows = $query->fetchAll(\PDO::FETCH_ASSOC);
            $totalCount = sizeof($rows);
            if ($totalCount > 0) {
                for ($i = 0; $i < $totalCount; $i++) {
                    $num .= '"' . implode($rows[$i]) . '",';
                }
                $num = substr($num, 0, -1);
            } else {
                $num = " ";
            }


        $bar_graph = '   
                      "labels": [' . $month . '],
                      "datasets": 
                      [{
                        "label": " Le nombre de tickets pour category ' . $categoryFullname. '  ",
                        "backgroundColor": ["#FFFFCC",
        "#CCFFFF",
        "#FFCCCC",
        "#99CCCC",
        "#FFCC99",
        "#CCCCFF",
        "#0099CC"],
                        "borderColor": "#00BFFF",
                        "data": [' . $num . ']
                      }]
                    ';
        return $bar_graph;
    }

    /**
     * Get all posts
     * @return array
     */
    public function analyseP() {

        $new_array= Array();
        $query = $this->db_connection->query('SELECT category, count(id) FROM ticket group by category ');
        //$query->fetch(\PDO::FETCH_ASSOC);
        while($row = $query->fetch(\PDO::FETCH_ASSOC)){
            $new_array[] = $row ;
        }
        return $new_array;
    }
    public function analyseChiffre() {

        $new_array= Array();
        $query = $this->db_connection->query('SELECT count(id) as nombre, category  FROM ticket group by category order by category ');
        while($row = $query->fetch(\PDO::FETCH_ASSOC)){
            $new_array[] = $row ;
        }
        return $new_array;
    }
}