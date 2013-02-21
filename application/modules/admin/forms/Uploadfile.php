<?php

class Admin_Form_Uploadfile extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$this -> setAction('index'); 
        $this -> setAttrib('id', 'formUpload'); 
        $this -> setAttrib('enctype', 'multipart/form-data'); 
        $fileUpload = $this -> createElement('File', 'fileUpload'); 
        $fileUpload -> setLabel('Upload Images: '); 
        $fileUpload -> setDestination(APPLICATION_PATH . '\modules\admin\uploads'); 
        $fileUpload -> addValidator(new Zend_Validate_File_FilesSize
				(
        			array
						(
        					'min'=>1, 
            				'max'=>999000,
            				'bytestring'=>true
						)
				)
        ); 
        $fileUpload -> addValidator(new Zend_Validate_File_Extension(array('gif,png,jpg'))); 
        $this -> addElement($fileUpload); 
        $submit = $this -> createElement('submit', 'Submit'); 
        $this -> addElement($submit); 
    }
}

