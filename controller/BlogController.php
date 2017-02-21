<?php
namespace BlogPHP\Controller;

class BlogController {
	
	protected $manager, $model;
    private $id;
	
	
    public function __construct() {
        $this->manager = new \BlogPHP\App\BlogManager;
        // Get the Model class in order for it to be used directly in all of this Controller
        $this->manager->getModel('Post');
        $this->model = new \BlogPHP\Model\Post;
        // The ID of the post directly in the constructor
		if(empty($_GET['id'])){
			$this->id = 0;
		} else {
			$this->id = (int) $_GET['id']; // The cast is used to double check that the id is indeed an integer
		}
    }
	
	public function home() {
		$this->manager->post = $this->model->getAll();
        $this->manager->getView('home');
    }
	
    public function blogPosts() {
        $this->manager->posts = $this->model->getAll(); // Get all the posts
        $this->manager->getView('blogPosts');
    }
	
	
    public function post() {
        $this->manager->post = $this->model->getById($this->id); // Get the specific post using it's ID
        $this->manager->getView('post');
    }
	
	
    public function notFound() {
        $this->manager->getView('404');
    }
	
	
    public function add() {
        if (!empty($_POST['add_submit'])) { // Making sure that the sumbit button is coming from the add.php page (containing the add_submit button) {
            if (isset($_POST['title'], $_POST['small_desc'], $_POST['content'], $_POST['author']) && mb_strlen($_POST['title']) <= 50) { // Allow a maximum of 50 characters {
                $data = array('title' => $_POST['title'], 'small_desc' => $_POST['small_desc'], 'content' => $_POST['content'], 'author' => $_POST['author'] );
                if ($this->model->add($data)) {
                    $this->manager->msgSuccess = 'The post was added with success.';
				} else {
                    $this->manager->msgError = 'An error has occured. Please contact the site admin.';
				}
            } else {
				// Might not be required, as we're already checking inside the html that everything is okay, but double checking is always nice.
                $this->manager->msgError = 'Kindly fill all of the required fields before you submit, and make sure the title is less than 50 characters!';
            }
        }
        $this->manager->getView('add');
    }
	
	
    public function edit()
    {
        if (!empty($_POST['edit_submit'])) { // Making sure that the sumbit button is coming from the edit.php page (containing the edit_submit button)
            if (isset($_POST['title'], $_POST['small_desc'], $_POST['content'], $_POST['author']) && mb_strlen($_POST['title']) <= 50) {
                $data = array('postId' => $this->id, 'title' => $_POST['title'], 'small_desc' => $_POST['small_desc'], 'content' => $_POST['content'], 'author' => $_POST['author'] );
                if ($this->model->update($data)) {
                    $this->manager->msgSuccess = 'The post was updated with success.';
				}
                else {
                    $this->manager->msgError = 'An error has occured. Please contact the site admin.';
				}
            }
            else {
                $this->manager->msgError = 'Kindly fill all of the required fields before you submit, and make sure the title is less than 50 characters!';
            }
        }
		
		// We get the data of the post
        $this->manager->post = $this->model->getById($this->id);
		
        $this->manager->getView('edit');
    }
	
	
    public function delete(){
        if (!empty($_POST['delete']) && $this->model->delete($this->id)) {
            header('Location: ' . ROOT_URL);
		}
        else {
            exit('Whoops! Post cannot be deleted.');
		}
    }
}