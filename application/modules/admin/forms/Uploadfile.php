<?php

class Admin_Form_Uploadfile extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$this->setAction('index'); 
        $this->setAttrib('id', 'form1'); 
        $this->setAttrib('enctype', 'multipart/form-data'); 
        $file1 = $this->createElement('File', 'file1'); 
        $file1->setLabel('Upload file1'); 
        $file1->setDestination(APPLICATION_PATH . '\modules\admin\uploads'); 
        Zend_Debug::dump(APPLICATION_PATH);
        $file1->addValidator(new Zend_Validate_File_FilesSize(array('min'=>1, 
            'max'=>10000,'bytestring'=>true))); 
        $file1->addValidator(new Zend_Validate_File_Extension(array('gif,png,jpg'))); 
        $this->addElement($file1); 
        $submit = $this->createElement('submit', 'Submit'); 
        $this->addElement($submit); 
    	
    }


}

