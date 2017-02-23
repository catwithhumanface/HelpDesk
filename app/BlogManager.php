<?php

namespace BlogPHP\App;

class BlogManager
{
    public function getView($view)
    {
		$path = ROOT_PATH . 'view/' . $view . '.php';
        if (is_file($path)) {
            require $path;
		} else {
            exit('The "' . $path . '" file doesn\'t exist'); 
		}
    }
    public function getModel($model)
    {
		$path = ROOT_PATH . 'model/' . $model . '.php';
        if (is_file($path)){
            require $path;
		} else {
            exit('The "' . $path . '" file doesn\'t exist');
		}
    }
	
}