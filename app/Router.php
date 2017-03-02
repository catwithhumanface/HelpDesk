<?php

namespace BlogPHP\App;


/**
 * Class Router that is used to create routes dynamically.
 * @package BlogPHP\App
 */

class Router {
    /**
     * @param array $params contaning the two kind of routes we'll be using, p and act
     */

    public static function run (array $params) {
		
        $namespace = 'BlogPHP\controller\\';
        $controllerDef = $namespace . 'BlogController';
        $controllerPath = ROOT_PATH . 'controller/';
        $controller = ucfirst($params['ctrl']);
		
        if (is_file($controllerPath . $controller . '.php')) {
            $controller = $namespace . $controller;
            $controllerNew = new $controller;
			//Creation of a new instance of $controllerNew using ReflectionClass in order to be able to use various methods on that specific class
			//More information about the ReflectionClass and it's methods here ->
				//http://php.net/manual/en/class.reflectionclass.php
            if ((new \ReflectionClass($controllerNew))->hasMethod($params['act']) && (new \ReflectionMethod($controllerNew, $params['act']))->isPublic()) {
                call_user_func(array($controllerNew, $params['act']));
			} else {
                call_user_func(array($controllerNew, 'notFound'));
			}
        }
        else {
            call_user_func(array(new $controllerDef, 'notFound'));
        }
    }
}