<?php

class Webservice_WebserviceController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
		// $this->_helper->layout->disableLayout();
		$this->Rest = new Classes_Rest;
		$this->Developers = new Application_Model_Developers();
    }

    public function indexAction()
    {
		// echo "Index";
    }
	
}

