<?php
/** Zend_Mobile_Push_Abstract **/
require_once 'Zend/Mobile/Push/Abstract.php';

/** Zend_Mobile_Push_Message_Apns **/
require_once 'Zend/Mobile/Push/Message/Apns.php';

class Classes_Notification extends Zend_Mobile_Push_Message_Abstract
{
	public function sendNotification($msg,$token){
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav'
				//'badge' => $badge
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
			
		// Close the connection to the server
		//socket_clear_error($fp);
		 fclose($fp);
		
		/* try {
			//$apns->send($message);
		} catch (Zend_Mobile_Push_Exception_InvalidToken $e) {
			// you would likely want to remove the token from being sent to again
			echo $e->getMessage();
		} catch (Zend_Mobile_Push_Exception $e) {
			// all other exceptions only require action to be sent
			echo $e->getMessage();
		} */
		//$apns->close();		
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;		
	}
	
	 
	public function sendNotificationforfavorite($msg,$token,$favoriteurl,$userurl,$username,$identity,$followerstatus){ 
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				'link_video' => $favoriteurl,
				'link_user' => $userurl,
				'username'=>$username,
				'identity'=>$identity,
				'followingstatus'=>$followerstatus
				//'badge' => $badge
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
			
		// Close the connection to the server
		//socket_clear_error($fp);
		 fclose($fp);
		
		/* try {
			//$apns->send($message);
		} catch (Zend_Mobile_Push_Exception_InvalidToken $e) {
			// you would likely want to remove the token from being sent to again
			echo $e->getMessage();
		} catch (Zend_Mobile_Push_Exception $e) {
			// all other exceptions only require action to be sent
			echo $e->getMessage();
		} */
		//$apns->close();		
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;		
	}
	
	
	
	
	
	public function sendNotificationvideo($msg,$token,$userurl,$username,$identity,$projectname){
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				'link_video' => $videourl,
				'link_user' => $userurl,
				'username'=>$username,
				'identity'=>$identity,
				'projectname'=>$projectname
				//'badge' => $badge
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
			
		// Close the connection to the server
		//socket_clear_error($fp);
		 fclose($fp);
		
		/* try {
			//$apns->send($message);
		} catch (Zend_Mobile_Push_Exception_InvalidToken $e) {
			// you would likely want to remove the token from being sent to again
			echo $e->getMessage();
		} catch (Zend_Mobile_Push_Exception $e) {
			// all other exceptions only require action to be sent
			echo $e->getMessage();
		} */
		//$apns->close();		
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;		
	}
	
	
	
	public function sendNotificationcomment($msg,$token,$videourl,$userurl,$username,$identity){
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				'link_video' => $videourl,
				'link_user' => $userurl,
				'username'=>$username,
				'identity'=>$identity,
				//'projectname'=>$projectname
				//'badge' => $badge
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
			
		// Close the connection to the server
		//socket_clear_error($fp);
		 fclose($fp);
		
		/* try {
			//$apns->send($message);
		} catch (Zend_Mobile_Push_Exception_InvalidToken $e) {
			// you would likely want to remove the token from being sent to again
			echo $e->getMessage();
		} catch (Zend_Mobile_Push_Exception $e) {
			// all other exceptions only require action to be sent
			echo $e->getMessage();
		} */
		//$apns->close();		
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;		
	}
	
	
	
	
	
	public function inviteNotification($msg,$token,$userurl,$username,$identity,$projectname,$projectid){
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				//'link_video' => $videourl,
				'link_user' => $userurl,
				'username'=>$username,
				'identity'=>$identity,
				'projectname'=>$projectname,
				'projectid'=>$projectid,
				//'badge' => $badge
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
			
		// Close the connection to the server
		//socket_clear_error($fp);
		 fclose($fp);
		
		/* try {
			//$apns->send($message);
		} catch (Zend_Mobile_Push_Exception_InvalidToken $e) {
			// you would likely want to remove the token from being sent to again
			echo $e->getMessage();
		} catch (Zend_Mobile_Push_Exception $e) {
			// all other exceptions only require action to be sent
			echo $e->getMessage();
		} */
		//$apns->close();		
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;		
	}
	
	
	
	
	public function sendNotificationforhit($msg,$token,$hiturl,$userurl,$username,$identity){
		
		
		//return "sendNotificationforhit";
		
		
	
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				//'link_video' => $videourl,
				'userurl' => $userurl,
				'hiturl' => $hiturl,
				'username'=>$username,
				'identity'=>$identity
				//'projectname'=>$projectname
				//'badge' => $badge
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
	
		 fclose($fp);
			
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;
		
		 
		 
		
	}
	
	
	public function notificationforfavorit($msg,$identity,$favoriteurl,$token,$userurl,$username,$favoriteFbid,$projectid,$favoriteProfile){
		
		//return $token;
		
		  
		ob_start();
		$passphrase='12345';
		$ssl = array(
				'local_cert' => APPLICATION_PATH.'/configs/pushcert.pem',
		);
		$ssl['passphrase'] = $passphrase;

				
		try {			
			
			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195',
					$errno,
					$errstr,
					60,
			STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT,
            stream_context_create(array(
                'ssl' => $ssl,
            ))
        );
//echo $ssl['local_cert'];
						
		} catch (Zend_Mobile_Push_Exception_ServerUnavailable $e) {
			// you can either attempt to reconnect here or try again later
			exit(1);
		} catch (Zend_Mobile_Push_Exception $e) {
			echo 'APNS Connection Error:' . $e->getMessage();
			exit(1);
		}
		if (!$fp)
			exit("Failed to connect: $errno $errstr" . PHP_EOL);
		
		
		$body['aps'] = array(
	
				'alert' => $msg,
				'sound' => 'CarTrader.wav',
				//'link_video' => $videourl,
				'link_user' => $userurl,
				'link_video' => $favoriteurl,
				'username'=>$username,
				'identity'=>$identity,
				'fbid'=>$favoriteFbid,
				'projectid'=>$projectid,
				'profile'=>$favoriteProfile
				//'projectname'=>$projectname
				//'badge' => $badge
					
				
		);
		$payload = json_encode($body);
		$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg);
	
		 fclose($fp);
			
		ob_end_flush();
		
		if ($result)
		{
			return true;
			
		}
		else
			return false;
		
		   
		
		
		
	} 
	
	
	
	
	  
	
}