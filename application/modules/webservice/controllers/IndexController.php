<?php

class Webservice_IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
		$this->Rest = new Classes_Rest;
		$this->Developers = new Application_Model_Developers();
    }

    public function indexAction()
    {
        // action body
		// echo "webservice";
		// $success = array('status' => "Success", "msg" => "Successfully one record deleted.");
		// $this->Rest->response($success,200);
		$submit = trim ( $this->getRequest ()->getParam ( 'submit' ) );
		$username = trim ( $this->getRequest ()->getParam ( 'username' ) );
		$email = trim ( $this->getRequest ()->getParam ( 'email' ) );
		$password = trim ( $this->getRequest ()->getParam ( 'password' ) );
		$passwordConfirm = trim ( $this->getRequest ()->getParam ( 'passwordConfirm' ) );
		if($submit!=""){

	//very basic validation
	if(strlen($username) < 3){
		$error[] = 'Username is too short.';
	} 

	if(strlen($password) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($passwordConfirm) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($password != $passwordConfirm){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$this->Developers->_email=$email;
		$getDevelopersEmail = $this->Developers->getDevelopersEmail();		
		if(!empty($getDevelopersEmail['0']['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}
	
	//if no errors have been created carry on
	if(!isset($error)){
	
	$hashedpassword = $this->Developers->encrypt($password, SHA_ENCRYPTION_KEY);
	$activasion = md5(uniqid(rand(),true));
		//hash the password
		try {
			$this->Developers->_developername=$username;
			$this->Developers->_password=$hashedpassword;
			$this->Developers->_email=$email;
			$this->Developers->_active=$activasion;
			$id = $this->Developers->addDevelopersInfo();
			echo $id;
			
			/*//send email
			$to = $email;
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering at Pilot App API page.</p>
			<p>To activate your account, please click on this link: <a href='".SERVER_URL."activate.php?x=$id&y=$activasion'>".SERVER_URL."activate.php?x=$id&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();*/

			//redirect to index page
			header('Location: '.SERVER_URL.'?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
			$this->view->error=$error;
		}

	}else{$this->view->error=$error;}

	}
    }
	
    public function loginAction()
    {
        // action body
		$submit = trim ( $this->getRequest ()->getParam ( 'submit' ) );
		$email = trim ( $this->getRequest ()->getParam ( 'email' ) );
		$password = trim ( $this->getRequest ()->getParam ( 'password' ) );
	if($submit!=""){

	$this->Developers->_email=$email;
	$this->Developers->_password=$password;
	if($this->Developers->login()){
	
		header('Location: '.SERVER_URL.'webservice/webservice/');
		// exit;
	}else {
		$error[] = 'Wrong username or password or your account has not been activated.';
		$this->view->error=$error;
	}

	}
    }
	
    public function forgotPasswordAction()
    {
        // action body
		$submit = trim ( $this->getRequest ()->getParam ( 'submit' ) );
		$email = trim ( $this->getRequest ()->getParam ( 'email' ) );
	if($submit!=""){

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$this->Developers->_email=$email;
		$getDevelopersEmail = $this->Developers->getDevelopersEmail();		
		if(empty($getDevelopersEmail['0']['email'])){
			$error[] = 'Email provided is not on recognised.';
		}

	}
	
	if(!isset($error)){
	
		$token = md5(uniqid(rand(),true));
		
		try {
			
			$this->Developers->_email=$email;
			$this->Developers->_active=$token;
			$status = $this->Developers->updateToken();
			
			echo $status;
			/* $stmt = $db->prepare("UPDATE members SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			)); */

			/* //send email
			$to = $row['email'];
			$subject = "Password Reset";
			$body = "<p>Someone requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send(); */

			//redirect to index page
			//header('Location: login.php?action=reset');
			//exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
			$this->view->error=$error;
		}
	
	}else{$this->view->error=$error;}
	
	
	
	
	/* $this->Developers->_email=$email;
	$this->Developers->_password=$password;
	$hashedpassword = $this->Developers->login(); */
	/* echo $_SESSION['loggedin'];
	echo $_SESSION['developername'];
	echo $_SESSION['developerID']; */
	/* if($user->login($email,$password)){ 
		$_SESSION['username'] = $username;
		header('Location: memberpage.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	} */
	
	
	//if no errors have been created carry on
	/*if(!isset($error)){
	
	$hashedpassword = $this->Developers->encrypt($password, SHA_ENCRYPTION_KEY);
	$activasion = md5(uniqid(rand(),true));
		//hash the password
		try {
			$this->Developers->_developername=$username;
			$this->Developers->_password=$hashedpassword;
			$this->Developers->_email=$email;
			$this->Developers->_active=$activasion;
			$id = $this->Developers->addDevelopersInfo();
			echo $id;

			//redirect to index page
			header('Location: '.SERVER_URL.'?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
			$this->view->error=$error;
		}

	}else{$this->view->error=$error;} */

	}
    }


}

