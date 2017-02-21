<?php

namespace BlogPHP\App;

class Autoloader {
	
    static function init() {
        // Register the autoloader method
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
	
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