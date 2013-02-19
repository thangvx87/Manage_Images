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
        $request = $this->getRequest(); 
        Zend_Debug::dump($request);
        $this->view->form = $form; 
        
        
        if ($request->isPost()) 
        { 
            //normal submit.. 
            if ($form->isValid($_POST)) 
            { 
                //determine filename and extension 
                $info = pathinfo($form->file1->getFileName(null,false)); 
                Zend_Debug::dump($info);
                die('222');
                $filename = $info['filename']; 
                $ext = $info['extension']?".".$info['extension']:""; 
                //filter for renaming.. prepend with current time 
                $form->file1->addFilter(new Zend_Filter_File_Rename(array( 
                                "target"=>time().$filename.$ext, 
                                "overwrite"=>true))); 
                $form->getValue('file1'); 
            } 
        }  
    }


}

