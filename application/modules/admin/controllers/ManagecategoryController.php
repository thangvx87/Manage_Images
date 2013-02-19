<?php

class Admin_ManagecategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        require_once APPLICATION_PATH . '\modules\admin\forms\Category.php';
        $request = $this->getRequest();
        $form = new Admin_Form_Category();
        $actionUrl = $this -> view -> url(array('module' => 'admin', 'controller' => 'Managecategory', 'action' => 'index'), 'moduleRoute', true);
        $form -> setAction($actionUrl);
    	if ($request -> isPost()) {
            if ($form->isValid($request -> getPost())) {
                $comment = new Admin_Model_Category($form -> getValues());
                $mapper = new Admin_Model_Categorymapper();
                $mapper->save($comment);
//              return $this->_helper->redirector('index');
            }
            else {
        		Zend_Debug::dump($form -> getMessages());
            	$form -> populate($request -> getPost());
            	$this->view->errors = $form -> getMessages();
            }
        }
        $this->view->form = $form;
    }
}

