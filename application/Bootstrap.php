<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

public function _initModuleRoutes()
	    {
	        $this->bootstrap('FrontController');
	        $frontController = $this->getResource('FrontController');
	        $router = $frontController->getRouter();
	
	        $route = new Zend_Controller_Router_Route(':module/:controller/:action/*',
	            array(
	                    'module' => 'admin',
	                    'controller' => 'managecategory',
	                    'action' => 'index'
	            )
	        );
	        $router->addRoute('moduleRoute', $route);
	        return $router;
	    }
}

