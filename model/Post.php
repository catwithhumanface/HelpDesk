<?php

namespace BlogPHP\Model;

class Post {
	
	protected $db_connection;
	
	public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }
	
	//Allowing the possibility to show only a specific set of posts in a certein range from $startLimit to $endLimit
	public function get($startLimit, $endLimit) {
		//Preparing the query 
        $query = $this->db_connection->prepare('SELECT * FROM posts ORDER BY date DESC LIMIT :startLimitRange, :endLimitRange');
		//Both of the ranges given through the bindParam() method, using the PDO::PARAM_INT
        $query->bindParam(':startLimitRange', $startLimit, \PDO::PARAM_INT);
        $query->bindParam(':endLimitRange', $endLimit, \PDO::PARAM_INT);
        $query->execute();
		//Return the results using FETCH_OBJ
			// More information about the different possibilities of fetching results : http://php.net/manual/en/pdostatement.fetch.php
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
	
	//Get all posts
	public function getAll() {
        $query = $this->db_connection->query('SELECT * FROM posts ORDER BY date DESC');
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
	
	//Get a post by it's ID
	public function getById($id) {
		//Normally we wouldn't be using LIMIT here, as the ID is unique anyways. But it's better to have several check ups to have exactly what we need.
        $query = $this->db_connection->prepare('SELECT * FROM posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }
	
	//Add a post
	public function add(array $queryData) {
        $query = $this->db_connection->prepare('INSERT INTO posts (title, small_desc, content, author) VALUES(:title, :small_desc, :content, :author)');
        $query->bindValue(':title', $queryData['title']);
        $query->bindValue(':small_desc', $queryData['small_desc']);
        $query->bindValue(':content', $queryData['content']);
        $query->bindValue(':author', $queryData['author']);
		return $query->execute($queryData);
    }
	
	//Updating an existing post by passing as a parametre the data as an array
	public function update(array $data) {
        $query = $this->db_connection->prepare('UPDATE posts SET title=:title, small_desc=:small_desc, content=:content, author=:author, date=NOW() WHERE id = :postId LIMIT 1');
        $query->bindValue(':postId', $data['postId'], \PDO::PARAM_INT);
        $query->bindValue(':title', $data['title']);
        $query->bindValue(':small_desc', $data['small_desc']);
        $query->bindValue(':content', $data['content']);
        $query->bindValue(':author', $data['author']);
        return $query->execute();
    }
	
	//Delete a post
	public function delete($id) {
		//Here the use of LIMIT is optional as well, but just in case something goes wrong, we use it to make sure nothing else is deleted.
        $query = $this->db_connection->prepare('DELETE FROM posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
	
}