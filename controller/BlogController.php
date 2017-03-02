<?php
namespace BlogPHP\Controller;

/**
 * Class BlogController
 * @package BlogPHP\Controller
 */
class BlogController {
	
	protected $manager, $model;
    private $id;


    /**
     * BlogController constructor.
     */
    public function __construct() {
        $this->manager = new \BlogPHP\app\BlogManager;
        // Get the Model class in order for it to be used directly in all of this Controller
        $this->manager->getModel('Post');
        $this->model = new \BlogPHP\model\Post;
        // The ID of the post directly in the constructor
		if(empty($_GET['id'])){
			$this->id = 0;
		} else {
			$this->id = (int) $_GET['id']; // The cast is used to double check that the id is indeed an integer
		}
    }

    /**
     * Generation of the homepage.
     */
	public function home() {
		$this->manager->post = $this->model->getAll();
        $this->manager->getView('home');
    }

    /**
     * Generation of the all blog posts.
     */
    public function blogPosts() {
        $this->manager->posts = $this->model->getAll(); // Get all the posts
        $this->manager->getView('blogPosts');
    }

    /**
     * Generation of a specific blog post.
     */
    public function post() {
        $this->manager->post = $this->model->getById($this->id); // Get the specific post using it's ID
        $this->manager->getView('post');
    }

    /**
     * Generation of the not found page.
     */
    public function notFound() {
        $this->manager->getView('404');
    }

    /**
     * Generation of the add post page where we're able to create a new post.
     */
    public function add() {
        if (!empty($_POST['add_submit'])) { // Making sure that the sumbit button is coming from the add.php page (containing the add_submit button) {
            if (isset($_POST['title'], $_POST['small_desc'], $_POST['content'], $_POST['author']) && mb_strlen($_POST['title']) <= 50 && !empty($_POST['title']) && !empty($_POST['small_desc']) && !empty($_POST['content']) && !empty($_POST['author'])) { // Allow a maximum of 50 characters and making sure the input we get is not empty (a bit equal to required="required" in the HTML form, but who trusts HTML anyways? :D)
                if(!ctype_space($_POST['title']) && !ctype_space($_POST['small_desc']) && !ctype_space($_POST['content']) && !ctype_space($_POST['author'])) { // Making sure there's a contact in the input we got that is not all full spaces
					if(mb_strlen($_POST['title']) >= 3 && mb_strlen($_POST['small_desc']) >= 3 && mb_strlen($_POST['content']) >= 3 && mb_strlen($_POST['author']) >= 3) { // Making sure each input is more than 3 characters
						if(preg_match('/\s/',$_POST['small_desc']) >= 1 && preg_match('/\s/',$_POST['content']) >= 1) { // Making sure content and the small description are more than 1 word
							$data = array('title' => htmlspecialchars($_POST['title']), 'small_desc' => htmlspecialchars($_POST['small_desc']), 'content' => htmlspecialchars($_POST['content']), 'author' => htmlspecialchars($_POST['author']));
							if ($this->model->add($data)) {
								$this->manager->msgSuccess = 'The post was added with success.';
							} else {
								$this->manager->msgError = 'An error has occured. Please contact the site admin.';
							}
						} else {
							$this->manager->msgError = 'The small description and/or content can\'t be consisted of only 1 word. 2 words minimum.';
						}
					} else {
						$this->manager->msgError = 'Minimum 3 letters required for each field.';
					}
				} else {
					$this->manager->msgError = 'Please don\'t fill any of the fields with blank spaces.';
				}
            } else {
				// Might not be required, as we're already checking inside the html that everything is okay, but double checking is always nice.
                $this->manager->msgError = 'Kindly fill all of the required fields before you submit, and make sure the title is less than 50 characters!';
            }
        }
        $this->manager->getView('add');
    }

    /**
     * Generation of the edit post page where we're able to update an existing post.
     */
    public function edit() {
        if (!empty($_POST['edit_submit'])) { // Making sure that the sumbit button is coming from the edit.php page (containing the edit_submit button)
            if (isset($_POST['title'], $_POST['small_desc'], $_POST['content'], $_POST['author']) && mb_strlen($_POST['title']) <= 50 && !empty($_POST['title']) && !empty($_POST['small_desc']) && !empty($_POST['content']) && !empty($_POST['author'])) {
				if(!ctype_space($_POST['title']) && !ctype_space($_POST['small_desc']) && !ctype_space($_POST['content']) && !ctype_space($_POST['author'])) {
					if(mb_strlen($_POST['title']) >= 3 && mb_strlen($_POST['small_desc']) >= 3 && mb_strlen($_POST['content']) >= 3 && mb_strlen($_POST['author']) >= 3) {
					    if(preg_match('/\s/',$_POST['small_desc']) >= 1 && preg_match('/\s/',$_POST['content']) >= 1) { // Making sure content and the small description are more than 1 word
							$data = array('postId' => $this->id, 'title' => htmlspecialchars($_POST['title']), 'small_desc' => htmlspecialchars($_POST['small_desc']), 'content' => htmlspecialchars($_POST['content']), 'author' => htmlspecialchars($_POST['author']) );
							if ($this->model->update($data)) {
								$this->manager->msgSuccess = 'The post was updated with success.';
							}
							else {
								$this->manager->msgError = 'An error has occured. Please contact the site admin.';
							}
						} else {
							$this->manager->msgError = 'The small description and/or content can\'t be consisted of only 1 word. 2 words minimum.';
						}
					} else {
						$this->manager->msgError = 'Minimum 3 letters required.';
					}
					
				} else {
					$this->manager->msgError = 'Please don\'t fill any of the fields with blank spaces.';
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

    /**
     * Generation of the delete post button.
     */
    public function delete(){
        if (!empty($_POST['delete']) && $this->model->delete($this->id)) {
            header('Location: ' . ROOT_URL);
		}
        else {
            exit('Whoops! Post cannot be deleted.');
		}
    }

    /**
     * Generation of the login page.
     */
    public function login() {
        if (!empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (isset($_POST['username'], $_POST['password'])) {
            if($this->model->getAuthentication($_POST['username'], $_POST['password'])) {
                session_start();
                $_SESSION['active'] = $_POST['username'];
                header('Location: ' . ROOT_URL);
                exit();
            } else {
                $this->manager->msgError = 'Your login credentials are incorrect. Please try again later.';
            }
        }
        $this->manager->getView('login');
    }

    /**
     * Generation of the logout page.
     */
    public function logout() {
        if (empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (!empty($_SESSION)) {
            $_SESSION = array();
            session_unset($_SESSION);
            session_destroy();
            setcookie(session_name(),'',0,'/');
        }
        $this->manager->getView('logout');
    }

    public function changePwd() {
        if (!empty($_POST['change_submit'])) { // Making sure that the sumbit button is coming from the change_password.php page (containing the change_submit button)
            if (isset($_POST['newPassword']) && mb_strlen($_POST['newPassword']) >= 10 && !empty($_POST['newPassword'])) {
                if(!ctype_space($_POST['newPassword'])) {
                    $password = htmlspecialchars($_POST['newPassword']);
                    if ($this->model->setAuthentication($password)) {
                         $this->manager->msgSuccess = 'The password was updated with success.';
                    } else {
                        $this->manager->msgError = 'An error has occured. Please contact the site admin.';
                    }
                } else {
                    $this->manager->msgError = 'Please don\'t have your password consisted of only blank spaces...';
                }
            }
            else {
                $this->manager->msgError = 'Password needs to be more than 9 characters.';
            }
        }
        $this->manager->getView('change_password');
    }
}