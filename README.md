# Blog-PHP-OOP
```
Blog-PHP-OOP
```

## Desription 
This is a blog created using PHP/OOP using the MVC architecture, Namespaces, PDO... and much more!

It was created in order to help others wanting a basic Blog created in OOP with an MVC patern. This is not a complete advanced and complex blog, it's but a simple blog that you can use as a kind of blog framework for PHP to start your own project under a *good development pattern* and a *good development practice* and organization.

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
** menu bar linking to the home page, the blog page and a page to add a new blog post
** contact form (name, email, message) with simple information
* Blog page containing :
** List of blog posts from most recent to most ancient 
** Each blog post showing the title, small description, last modification date and several links to read more, edit and delete the post
* Post page containing :
** Blog article showing the title, small description, content, author, last modification date and several links to edit and delete the post
* Add new post page containing a form to fill in order to add a post
* Edit post page containing a form to fill in order to edit a post

## Setup
Here I'll be explaining how to setup the project on your localhost ! But please note, this version of the code only works in windows, as the Autoloader isn't meant to work for Unix.
* Step 1 : Fork this project or download it as a zip and extract it in Wamp (or MAMP)
* Step 2 : Create a database called 'blogMVC_OOP' and import into it the sql file called 'blogMVC_OOP.sql'
* Step 3 : In \App\Database.php, change the database's host/name/password to yours

## Author
Islam Elshobokshy - http://islamelshobokshy.info

## License
MIT
