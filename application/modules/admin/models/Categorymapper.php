<?php

class Admin_Model_Categorymapper extends Zend_Db_Table_Abstract
{
	protected $_name = "category";
	public function save (Admin_Model_Category $category)
	{
		$data = array(	
	        				'categoryId' => $category -> getCategoryId(),
					        'categoryName' => $category -> getCategoryName(), 
					        'categoryDescription' => $category -> getCategoryDescription(),
							'categoryStatus' => $category -> getCategoryStatus()
		);
		$this ->  insert($data);
	}
}

