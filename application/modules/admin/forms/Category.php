<?php

class Admin_Form_Category extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$this -> setMethod(Zend_Form::METHOD_POST);
    	
    	$categoryName = new Zend_Form_Element_Text('CategoryName');
    	$catValidator = new Zend_Validate_StringLength(0, 50);
        $catNameRegex = new Zend_Validate_Regex('/[a-zA-Z]/');
		$catNameRegex->setMessage('Your validation message goes here', Zend_Validate_Regex::NOT_MATCH);
        $categoryName->setLabel('Category Name:');
        $categoryName->setRequired(true);
        $categoryName->setValidators(array($catValidator,$catNameRegex));
        $this->addElement($categoryName);
        
		$categoryStatus = new Zend_Form_Element_Select('categoryStatus');
		$arrStatus = array(
						'defaul:' => 'Choson Status',
						'None:' => '0',
						'True:' => '1',
						'False:' => '2'
		);
		$categoryStatus -> addMultiOptions($arrStatus);
		$categoryStatus -> setLabel('Category Status: ');
		$categoryStatus -> setValue('defaul:');
		$this -> addElement($categoryStatus);
		
		$categoryDescription = new Zend_Form_Element_Textarea('categoryDescription');
		$categoryDescription -> setOptions(array('cols' => '34', 'rows' => '14'));
		$categoryDescription -> setLabel('Category Description:');
		$this -> addElement($categoryDescription);
		
		/*Upload Images*/
		/*$image = new Zend_Form_Element_File('Images');
		$image	->setLabel('Upload quảng cáo')
				->setDestination('images/upload/ads')
				->addValidator('NotEmpty', true, array(
										'messages' => array(
										'isEmpty' => 'Bạn chưa chọn ảnh upload')
				))
		->addValidators(array(
		array('Db_NoRecordExists', true,
		array(
		'messages' =>
		array(Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Tên ảnh đã tồn tại,vui lòng chọn ảnh khác'),
		'table' => 'category',
		'field' => 'Images')
		)))	
		->setRequired(true);
		$this->addElement($image);*/
		/*End upload*/
		
		$submit = new Zend_Form_Element_Submit('submit');        
        $submit->setLabel('Add Category');
        $reset = new Zend_Form_Element_Reset('reset');
        $reset->setLabel('Reset');
        $this->addElements(array($submit,$reset));
    }


}

