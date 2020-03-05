<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_email extends CI_Model
{
	public function send_sms($mobile_no,$message)
	{
		$msg=urlencode($message);
		
		$url1 ="http://greensms.greenworlddesignstudio.com/api/sendmsg.php?user=rccabs&pass=RC@007&sender=RCCABS&phone=".$mobile_no."&text=".$msg."&priority=ndnd&stype=normal";
		$result = file_get_contents($url1);
		
	
	}
	public function send_email($to, $subject, $message_mail){
		
		/*$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	 
		$headers .= 'From: care@rashmicabs.com' . "\r\n" .
				'Reply-To: care@rashmicabs.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

				if(mail($to, $subject, $message_mail, $headers))
				{
					echo "success";
				}
				else
				{
					echo "fail";
				}*/

		/*
		$from_email = "info@rashmicabs.com"; 
         $to_email = $to; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Greenworld'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   		$this->email->send();*/
         //Send mail 
         /*if($this->email->send()) 
         // echo "success";
         else 
          $this->email->display_errors();*/
        // $this->load->view('email_form');		
		
		// added by ashish -22/7/2019.
		$this->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.gmail.com";		
		$config['smtp_port'] = "587";
		$config['smtp_user'] = "rashmicabs@gmail.com"; 
		$config['smtp_pass'] = "RAHULGANDHI&111";
		$config['smtp_crypto'] = "tls";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from("rashmicabs@gmail.com","Greenworld");
		$list = array($to);
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($message_mail);
		if($this->email->send())
		{
			$response["code"] = 1;
			$response["msg"] = "mail send successfully";
		}
		else
		{
			$response["code"] = 0;
			$response["msg"] = "mail not send";
		}
	}	


	
	public function send_notification($receiver_id,$receiver_type,$message)
	{
			error_reporting(-1);
				ini_set('display_errors', 'On');
				
				if($receiver_type == '2')
				{
				require_once __DIR__ .'/firebase/firebase.php';
				require_once __DIR__ .'/firebase/push.php';
				}
				else
				{
				require_once __DIR__ .'/customer_firebase/firebase.php';
				require_once __DIR__ .'/customer_firebase/push.php';
				}
				$firebase = new Firebase();
				$push = new Push();
		
				// optional payload
				$payload = array();
				$payload['team'] = 'India';
				$payload['score'] = '5.6';
		
				// notification title
				$title = "eATMCoin";
				
				// notification message
				//$message = "You have received a Label";
				
				// push type - single user / topic
				//$push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
				
				// whether to include to image or not
				$include_image = isset($_GET['include_image']) ? TRUE : FALSE;
		
		
				$push->setTitle($title);
				$push->setMessage($message);
				if ($include_image) {
					$push->setImage('http://api.androidhive.info/images/minion.jpg');
				} else {
					$push->setImage('');
				}
				$push->setIsBackground(FALSE);
				$push->setPayload($payload);
				$push_type = 'individual';
		
				$json = '';
				$response = '';
		
				if ($push_type == 'topic') {
					$json = $push->getPush();
					$response = $firebase->sendToTopic('global', $json);
				} else if ($push_type == 'individual') {
					$json = $push->getPush();
					if($receiver_type == '2')
					{
					$regId = $this->db->get_where('eatm_merchants',array('id'=>$receiver_id))->row()->m_device_id;
					}
					if($receiver_type == '3')
					{
					$regId = $this->db->get_where('eatm_customer',array('id'=>$receiver_id))->row()->c_device_id;
					}
					
					$response = $firebase->send($regId, $json);
				}
        
	}

}?>