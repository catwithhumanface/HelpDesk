# Blog-PHP-OOP
````
Blog-PHP-OOP
````

## Desription 
This is a blog created using PHP/OOP using the MVC architecture, Namespaces, PDO... and much more!
This is not a complete advanced and complex blog, it's but a simple blog that you can use as a blog framework for PHP.

## Version
1.0

## Requirements
### Server requirements to run the project
* 1) PHP version 5.5 or higher
* 2) MySQL version 5.6 or higher
* 3) Having the mbstring PHP extension loaded

### Specification
* Homepage containing :  
** the logo of the website  
** photo of the admin  
** description of the admin  
** CV of the admin  
** social network links  
** menu bar linking to the home page, the blog page and -a login page if not looged in -a page to add a new blog post and logout if logged in  
** contact form (name, email, message) with simple information  

* Login page contaning :
** login form to enter username and password

* Blog page containing :  
** List of blog posts from most recent to most ancient  
** Each blog post showing the title, small description, last modification date and a link to read more  
** if logged in two links to edit and delete the post  

* Post page containing :  
** Blog article showing the title, small description, content, author, last modification date  
** if logged in two links to edit and delete the post  

* Add new post page containing a form to fill in order to add a post  
* Edit post page containing a form to fill in order to edit a post  

## Setup
### Windows server (localhost mostly)
Here I'll be explaining how to setup the project on your localhost ! But please note, this version of the code only works in windows, as the Autoloader isn't meant to work for Unix.  
* Step 1 : Fork this project or download it as a zip and extract it in Wamp (or MAMP)
* Step 2 : Create a database called 'blogMVC_OOP' and import into it the sql file called 'blogMVC_OOP.sql'
* Step 3 : In \App\Database.php, change the database's host/name/password to yours
* Step 4 : To change the contact's form sending email address please open \content\contact_me.php and in line 18 and 21 change the email addess to yours. **Also, please not that that the contact form will NOT work on localhost as it has no STMP mailing servers installed. You need to have the site up and running in a server in order for it to work.**

### Linux/Unix server (web hosting websites)
I'll explain here in details what to modify in the code in order to have it working in your web hosting website if you won't work locally and intend to put it up in a live website. **Please note, all of the steps above in the *Windows server* paragraph needs to be done first before moving on to this part. As it's not a replacement to what was written above, but it's continuation**
* Step 1 : Open index.html, comment line 24 and uncomment line 27 or just change line 24 with 
```php
define('ROOT_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES)))); 
```
* Step 2 : Open \app\Autoloader.php and change the lines from 15 to 23 with :
```php
  $class = str_replace(array(__NAMESPACE__, 'BlogPHP', '\\'), '/', $class);
  if (is_file(__DIR__ . '/' . $class . '.php')) {	
      require_once(__DIR__ . '/' . $class . '.php');
  }
  if (is_file(ROOT_PATH . $class . '.php')) {
      require_once(ROOT_PATH . $class . '.php');
  }
}

```
## Author
Islam Elshobokshy - https://github.com/elshobokshy

## License
MIT
