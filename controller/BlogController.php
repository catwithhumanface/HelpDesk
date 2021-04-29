<?php
namespace BlogPHP\Controller;

use BlogPHP\Model\Authentication;
use BlogPHP\Model\Post;

/**
 * Class BlogController
 * @package BlogPHP\Controller
 */
class BlogController {

	protected $manager, $modelPost, $modelAuthentication;
    private $id;


    /**
     * BlogController constructor.
     */
    public function __construct() {
        $this->manager = new \BlogPHP\app\BlogManager;
        // Get the Model class in order for it to be used directly in all of this Controller
        $this->manager->getModel('Post');
        $this->manager->getModel('Authentication');
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
        $this->modelPost = new Post();
        if(isset($_GET['cp']) && !empty($_GET["cp"])) {
            $currentPage = (int)$_GET['cp'];
        }else {
            $currentPage = 1;
        }
        $_SESSION['currentPage'] = $currentPage;

        if(isset($_GET["category"]) && !empty($_GET["category"])) {
            $category = $_GET["category"];
            $_SESSION['category'] = $category;
        }else {
            $category = "all";
        }
        $_SESSION['category'] = $category;
		$tickets_per_page = 3;
		$offset = ($currentPage -1) * $tickets_per_page;
        $this->manager->post = $this->modelPost->get($offset, $tickets_per_page, $category);
        $this->manager->getView('home');
    }

    /**
     * Generation of the all blog posts.
     */
    public function blogPosts() {
        $this->modelPost = new Post();
        //$this->manager->post = $this->modelPost->getAll();
        if(isset($_GET["cp"]) && !empty($_GET["cp"])) {
            $currentPage = (int)$_GET["cp"];
        }else {
            $currentPage = 1;
        }
        $_SESSION['currentPage'] = $currentPage;

        if(isset($_GET["category"]) && !empty($_GET["category"])) {
            $category = $_GET["category"];
            $_SESSION['category'] = $category;
        }else {
            $category = "all";
        }
        $_SESSION['category'] = $category;

        $tickets_per_page = 3;
        $offset = ($currentPage -1) * $tickets_per_page;
        $this->manager->post = $this->modelPost->get($offset, $tickets_per_page, $category);
        //$this->manager->post = $this->modelPost->getAll();
        $this->manager->getView('blogPosts');
    }
    /**
     * Generation of the mon compte page.
     */
    public function mon_compte() {
			  $this->modelPost = new Post();
				//$this->manager->post = $this->modelPost->getById($this->id);
        if(isset($_GET["cp1"]) && !empty($_GET["cp1"])) {
            $currentPage = (int)$_GET["cp1"];
        }else {
            $currentPage = 1;
        }
        $_SESSION['currentPage'] = $currentPage;

        if(isset($_GET["category"]) && !empty($_GET["category"])) {
            $category = $_GET["category"];
            $_SESSION['category'] = $category;
        }else {
            $category = "all";
        }
        $_SESSION['category'] = $category;

        $tickets_per_page = 3;
        $offset = ($currentPage -1) * $tickets_per_page;
        $this->manager->post = $this->modelPost->getAll();
				//$this->manager->MesReponses = $this->modelPost->getMyReponse($this->id);

        $this->manager->getView('mon_compte');
    }
    /**
     * Generation of the mes reponses via la page Mon compte
     */
		public function mon_compte_mesreponses() {
				$this->modelPost = new Post();
				//$this->manager->post = $this->modelPost->getById($this->id);

			//	$this->manager->post = $this->modelPost->getAll();
				$this->manager->mesReponses = $this->modelPost->getMyReponse();

				$this->manager->getView('mon_compte_mesreponses');
		}
    /**
     * Generation of a specific ticket post.
     */
    public function post() {
        $this->modelPost = new Post();
        $this->manager->post = $this->modelPost->getById($this->id); // Get the specific post using it's ID
        //$this->manager->postReponse = $this->modelPost->getByIdReponse($this->id);
        $this->manager->getView('post');
    }

    /**
     * Generation of the not found page.
     */
    public function notFound() {
        $this->manager->getView('404');
    }

    /**
     * Generation of the add ticket page where we're able to create a new ticket.
     */
    public function add() {
        $this->modelPost = new Post();
        if (!empty($_POST['add_submit'])) { // Making sure that the sumbit button is coming from the add.php page (containing the add_submit button) {
                if (isset($_POST['title'], $_POST['category'], $_POST['content'])  <= 50 && !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['content'])) {
                    if(!ctype_space($_POST['title']) && !ctype_space($_POST['category']) && !ctype_space($_POST['content'])) {
                        if(mb_strlen($_POST['title']) >= 3 && mb_strlen($_POST['category']) >= 3 && mb_strlen($_POST['content']) >= 3 ) {
                            if(preg_match('/\s/',$_POST['content']) >= 1) { // Making sure content and the small description are more than 1 word
							$data = array('title' => htmlspecialchars($_POST['title']), 'content' => htmlspecialchars($_POST['content']), 'category' => htmlspecialchars($_POST['category']));
							if ($this->modelPost->add($data)) {
								$this->manager->msgSuccess = 'Votre ticket a été créé.';
                                header('Location: ' . ROOT_URL."?p=blogController&a=blogPosts");
							} else {
								$this->manager->msgError = 'Une erreur s\'est produite. Veuillez Réessayer.';
							}
						} else {
							$this->manager->msgError = 'Le contenu du ticket doit contenir au minimum deux mots.';
						}
					} else {
						$this->manager->msgError = 'Minimum 3 lettres sont demandé à chaque case.';
					}
				} else {
					$this->manager->msgError = 'Veuillez ne pas remplir chaque case seulement avec espace vide.';
				}
            } else {
                $this->manager->msgError = 'Veuillez rentrer toutes les cases demandées. Votre titre peut au maximum contenir 50 caractères!';
            }
        }
        $this->manager->getView('add');
    }

    /**
     * Generation of the edit ticket page where we're able to update an existing ticket.
     */
    public function edit() {
        $this->modelPost = new Post();
        if (!empty($_POST['edit_submit'])) { // Making sure that the sumbit button is coming from the edit.php page (containing the edit_submit button)
            if (isset($_POST['title'], $_POST['category'], $_POST['content'])  <= 50 && !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['content'])) {
				if(!ctype_space($_POST['title']) && !ctype_space($_POST['category']) && !ctype_space($_POST['content'])) {
					if(mb_strlen($_POST['title']) >= 3 && mb_strlen($_POST['category']) >= 3 && mb_strlen($_POST['content']) >= 3 ) {
					    if(preg_match('/\s/',$_POST['content']) >= 1) { // Making sure content and the small description are more than 1 word
							$data = array('postId' => $this->id, 'title' => htmlspecialchars($_POST['title']), 'category' => htmlspecialchars($_POST['category']), 'content' => htmlspecialchars($_POST['content']) );
							if ($this->modelPost->update($data)) {
								$this->manager->msgSuccess = 'Votre ticket a bien été modifié.';
							}
							else {
								$this->manager->msgError = 'Une erreur s\'est produite. Veuillez Réessayer.';
							}
						} else {
							$this->manager->msgError = 'Le contenu du ticket doit contenir au minimum deux mots.';
						}
					} else {
						$this->manager->msgError = 'Minimum 3 lettres sont demandé à chaque case.';
					}

				} else {
					$this->manager->msgError = 'Veuillez ne pas remplir chaque case seulement avec espace vide.';
				}
            }
            else {
                $this->manager->msgError = 'Veuillez rentrer toutes les cases demandées. Votre titre peut au maximum contenir 50 caractères!';
            }
        }

		// We get the data of the post
        $this->manager->post = $this->modelPost->getById($this->id);
        $this->manager->getView('edit');
    }

    /**
     * Generation of the delete ticket button.
     */
    public function delete(){
        $this->modelPost = new Post();
        if ($this->modelPost->delete($this->id)) {
            header('Location: ' . ROOT_URL."?p=blogController&a=blogPosts");
		}
        else {
            exit('Whoops! Votre ticket ne peut pas être supprimé.');
		}
    }
    /**
     * Generation of the fermeture ticket button.
     */
    public function fermer(){
        $this->modelPost = new Post();
        if ($this->modelPost->fermer($this->id)) {
            header('Location: ' . ROOT_URL."?p=blogController&a=blogPosts");
        }
        else {
            exit('Whoops! Votre ticket ne peut pas être supprimé.');
        }
    }
    /**
     * Generation of the repondre button (seulement pour professeur et admin)
     */
    public function repondre() {
        $this->modelPost = new Post();
        if (!empty($_POST['add_submit'])) { // Making sure that the sumbit button is coming from the add.php page (containing the add_submit button) {
            if (isset( $_POST['content']) && !empty($_POST['content']) ) { // Allow a maximum of 50 characters and making sure the input we get is not empty (a bit equal to required="required" in the HTML form, but who trusts HTML anyways? :D)
                if(!ctype_space($_POST['content']) ) { // Making sure there's a contact in the input we got that is not all full spaces
                    if(mb_strlen($_POST['content']) >= 3) { // Making sure each input is more than 3 characters
                        if( preg_match('/\s/',$_POST['content']) >= 1) { // Making sure content and the small description are more than 1 word

                            if ($this->modelPost->addReponse($this->id, ($_POST['content']) ) ){
                                $this->manager->msgSuccess = 'Votre réponse a bien été ajouté.';
                            } else {
                                $this->manager->msgError = 'Une erreur s\'est produite. Veuillez Réessayer.';
                            }
                        } else {
                            $this->manager->msgError = 'Le contenu du ticket doit contenir au minimum deux mots.';
                        }
                    } else {
                        $this->manager->msgError = 'Minimum 3 lettres sont demandé à chaque case.';
                    }
                } else {
                    $this->manager->msgError =  'Veuillez ne pas remplir chaque case seulement avec espace vide.';
                }
            }  else {
                $this->manager->msgError = 'Veuillez rentrer toutes les cases demandées. Votre titre peut au maximum contenir 50 caractères!';
            }
        }
        $this->manager->getView('addReponse');
    }
    /**
     * Generation of the get reponses
     */
    public function reponse() {
        $this->modelPost = new Post();
        $this->manager->post = $this->modelPost->getReponse($this->id);
        $this->manager->getView('reponses');
    }
    /**
     * Generation of mes reponses
     */
		public function mesReponses() {
				$this->modelPost = new Post();
				$this->manager->post = $this->modelPost->getMyReponse();
				$this->manager->getView('mesReponses');
		}
    /**
     * Generation of the login page.
     */
    public function login() {
        $this->modelAuthentication = new Authentication();
        if (!empty($_SESSION['active'])) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (isset($_POST['email'], $_POST['password'])) {

            if($this->modelAuthentication->getAuthentication($_POST['email'], $_POST['password'])) {
                //get information of users and up to session!!!
                $_SESSION['active'] = $_POST['email'];
                header('Location: ' . ROOT_URL);
                exit();
            } else {
                $this->manager->msgError = 'Vos informations ne sont pas correctes. Veuillez réessayer.';
            }
        }
        $this->manager->getView('login');
    }

		/**
		 * Generation of the subscription page.
		 */
		public function subscription() {
            $this->modelAuthentication = new Authentication();
				if (isset($_POST['email'], $_POST['password'], $_POST['typeuser'], $_POST['username'])) {
				    $this->manager->check =$this->modelAuthentication->checkEmail($_POST['email']);
                    if($this->manager->check){
						if($this->modelAuthentication->join($_POST['email'], $_POST['password'], $_POST['typeuser'], $_POST['username'])) {
								header('Location: ' . ROOT_URL);
								exit();
						} else {
								$this->manager->msgError ='Vos informations ne sont pas correctes. Veuillez réessayer.';
						}
                    }else{
                        $this->manager->msgError = 'Cette adresse mail existe déjà. Veuillez rentrer une autre adresse mail';
                    }
				}
				$this->manager->getView('subscription');
		}

    /**
     * Generation of the logout page.
     */
    public function logout() {
        $this->modelAuthentication = new Authentication();
        if (empty($_SESSION)) {
            header('Location: ' . ROOT_URL);
            exit();
        } else if (!empty($_SESSION)) {
            $_SESSION = array();
            //session_unset($_SESSION);
            session_destroy();
            setcookie(session_name(),'',0,'/');
        }
        $this->manager->getView('logout');
    }

    public function changePwd() {
        $this->modelAuthentication = new Authentication();
        if (!empty($_POST['change_submit'])) { // Making sure that the sumbit button is coming from the change_password.php page (containing the change_submit button)
            if (isset($_POST['newPassword']) && mb_strlen($_POST['newPassword']) >= 10 && !empty($_POST['newPassword'])) {
                if(!ctype_space($_POST['newPassword'])) {
                    $password = htmlspecialchars($_POST['newPassword']);
                    if ($this->modelAuthentication->setAuthentication($password)) {
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
    /**
     * Generation of analyse page1 (seulement pour admin)
     */
    public function analyse() {
        $this->modelPost = new Post();
        $category = "P";
        if (isset($_GET["category"]) && !empty($_GET["category"])){
            $category = $_GET["category"];
            $_SESSION['categoryA'] = $category;
        }
        $category=$category."%";
        $this->manager->post = $this->modelPost->analyse($category);
        $this->manager->getView('analyse');
    }
    /**
     * Generation of analyse page2 (seulement pour admin)
     */
    public function analyseP() {
        $this->modelPost = new Post();
        //$this->manager->category = $this->modelPost->analyseP();
        $this->manager->chiffre = $this->modelPost->analyseChiffre();
        $this->manager->getView('analyseP');
    }
}
