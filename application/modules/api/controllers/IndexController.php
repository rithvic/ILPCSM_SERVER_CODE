<?php

class Api_IndexController extends Zend_Controller_Action
{
	protected $Rest;
    public function init()
    {
        /* Initialize action controller here */
		$this->_helper->layout->disableLayout();
		$this->Rest = new Classes_Rest;
    }

    public function indexAction()
    {
        // action body
		// echo "API";
		$success = array('status' => "Success", "msg" => "Successfully one record deleted.");
		$this->Rest->response($success,200);
    }


}

