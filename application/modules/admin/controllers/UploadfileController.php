<?php

class Admin_UploadfileController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body 
        require_once APPLICATION_PATH . '\modules\admin\forms\Uploadfile.php';
        $form = new Admin_Form_Uploadfile(); 
        $request = $this -> getRequest(); 
        $actionUrl = $this -> view -> url(array('module' => 'admin', 'controller' => 'Uploadfile', 'action' => 'index'), 'moduleRoute', true);
        $form -> setAction($actionUrl);
        Zend_Debug::dump($actionUrl);
        $this -> view -> form = $form;
        if ($request -> isPost())
        { 
            //normal submit.. 
            if ($form -> isValid($_POST)) 
            { 
                //determine filename and extension 
                $info = pathinfo($form -> fileUpload -> getFileName(null,false));
                $filename = $info['filename']; 
                $ext = $info['extension']?".".$info['extension']:""; 
                //filter for renaming.. prepend with current time 
                $form -> fileUpload -> addFilter(new Zend_Filter_File_Rename(array( 
                                "target" => time().$filename.$ext, 
                                "overwrite" => true)));
                $form -> getValue('fileUpload');
               	$a = $form -> fileUpload -> getFileInfo();
                Zend_Debug::dump($a['fileUpload']['tmp_name']);
                
            } 
        }  
    }


}

