<?php

class Admin_Model_Category
{
	protected $_categoryId;
	protected $_categoryName;
	protected $_categoryStatus;
	protected $_categoryDescription;

	public function __construct (array $options = null)
    {
        if (is_array($options)) {
            $this -> setOptions($options);
        }
    }
    public function __set ($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || ! method_exists($this, $method)) {
            throw new Exception('Invalid guest property');
        }
        $this -> $method($value);
    }
    public function __get ($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || ! method_exists($this, $method)) {
            throw new Exception('Invalid guest property');
        }
        return $this->$method();
    }
    public function setOptions (array $options)
    {
        $methods = get_class_methods($this);//lay tat ca ham trong this class return 1 array
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key); //setRegisterId
            if (in_array($method, $methods)) {
            	$this -> $method($value);
            }
        }
        return $this;
    }
 	/*_CategoryId*/
    public function setCategoryId ($categoryId)
    {
        $this->_categoryId = (int) $categoryId;
        return $this;
    }
    public function getCategoryId ()
    {
        return $this->_categoryId;
    }
    /* $_categoryName*/ 
    public function setCategoryName ($categoryName)
    {
    	$this -> _categoryName = (string) $categoryName;
    	return $this;
    }
    public function getCategoryName ()
    {
    	return $this -> _categoryName;
    }
    /* _categoryDescription*/ 
    public function setCategoryDescription ($categoryDescription)
    {
    	$this -> _categoryDescription = (string) $categoryDescription;
    	return $this;
    }
    public function  getCategoryDescription ()
    {
    	return $this -> _categoryDescription;
    }
    /* categoryStatus*/ 
    public function setCategoryStatus ($categoryStatus)
    {
    	$this -> _categoryStatus = (string) $categoryStatus;
    	return $this;
    }
    public function  getCategoryStatus ()
    {
    	return $this -> _categoryStatus;
    }
    

}


