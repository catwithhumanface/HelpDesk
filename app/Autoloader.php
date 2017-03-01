<?php

namespace BlogPHP\App;

/**
 * Class Autoloader
 * @package BlogPHP\App
 */
class Autoloader {
	
    static function init() {
        // Register the autoloader method
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // If you're on a linux based server, please uncomment this function and comment all of the next one :
    /*
    static function autoload($class){

        // Remove namespace and backslash
        $class = str_replace(array(__NAMESPACE__, 'BlogPHP', '\\'), '/', $class);
        if (is_file(__DIR__ . '/' . $class . '.php')) {
            require_once(__DIR__ . '/' . $class . '.php');
        }
        if (is_file(ROOT_PATH . $class . '.php')) {
            require_once(ROOT_PATH . $class . '.php');
        }
    }
    */

    /**
     * @param string $class Contains the class name to be autoloaded.
     */
    static function autoload($class){

        // Remove namespace and backslash
        $class = str_replace(array(__NAMESPACE__, 'BlogPHP', DIRECTORY_SEPARATOR), '/', $class);
		
        if (is_file(__DIR__ . '/' . $class . '.php')) {	
            require_once(__DIR__ . '/' . $class . '.php');
		}
        if (is_file(ROOT_PATH . $class . '.php')) {
            require_once(ROOT_PATH . $class . '.php');
		}
    }

}