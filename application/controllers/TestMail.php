<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('BACKUP_DIR', './uploads/invoice' ) ;

class TestMail extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$to      = "sohilpadhiyar@gmail.com";
		$subject = 'Rashmi Cabs ';
		
		$this->db->select('booking_list.*,package_type.package_type,package_type.package_sub_type,city_detail.c_name,payment_type.payment_name');
		$this->db->from('booking_list');
		$this->db->join('package_type','package_type.id=booking_list.b_type');
		$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
		$this->db->join('payment_type','payment_type.id=booking_list.b_payment_type');
		$this->db->where('booking_list.id',111);
		$booking_details = $this->db->get()->row();
		
		$passenger_details=$this->db->get_where('passenger_list',array('id'=>$booking_details->b_p_id))->row();
		
		$data['booking_details']=$booking_details;
		$data['passenger_details']=$passenger_details;
		//$message_mail = $this->load->view('mail_passenger_register',$data,true);
 		//$message_mail = $this->load->view('mail_booking_confirm',$data,true);
		//$message_mail = $this->load->view('mail_booking_package_upgrade',$data,true);
		
		//$message_mail = $this->load->view('mail_booking_vehicle_driver_assign',$data,true);
		//$message_mail = $this->load->view('mail_booking_cancel',$data,true);
		$data['message']='Thank you for booking with us Rashmi Cabs your Ref #'.$data['booking_details']->b_id.' Hope you had a wonderful trip. <br> Please Check Attachment Invoice File';
		$message_mail = $this->load->view('mail_booking_trip_complete',$data,true);
		//echo $message_mail;exit;
		
		$this->load->model('Sms_email');
		$this->Sms_email->send_email($to, $subject, $message_mail);
		
	
	}
	public function InvoiceMail()
	{
		$id = 89;
		   
		//echo $id; exit;		   
	
		   
		$data['invoice'] = $this->db->get_where('invoice',array('id'=>$id))->row();
		   
		$rent_card_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row()->b_rent_card_id;
			
		$data['rent_card'] = $this->db->get_where('rent_cards',array('id'=>$rent_card_id))->row();
			
		$booking_details = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		   
		if($booking_details->b_ac_non_ac==1)
		{
			$data['ac_non_ac'] =  ' AC';
		}
		else
		{
			$data['ac_non_ac'] =  ' NON AC';
		}
		
		$data['booking_details'] = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		$data['passenger_details']=$this->db->get_where('passenger_list',array('id'=>$data['booking_details']->b_p_id))->row();
			
		
		$invoice_template=$this->load->view('invoice_view_pdf',$data,true);
		//echo $invoice_template;
			
			
		//generate pdf
		if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0755) ;
        if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0755) ;
			
		$pdfFilePath = BACKUP_DIR."/invoice.pdf";
	 
		//load mPDF library
		$this->load->library('m_pdf');
	 
		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($invoice_template);
	 
		//download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "F");  
			
					
		$data['message']='Thank you for booking with us Rashmi Cabs your Ref #'.$data['booking_details']->b_id.' Hope you had a wonderful trip. <br> Please Check Attachment Invoice File';
					
		$body = $this->load->view('mail_booking_trip_complete',$data,true);
		//echo $body ;exit;
			
			
		$filename= "invoice.pdf";
		$my_path = BACKUP_DIR . '/';
				
		$file = $my_path.$filename;
		$file_size = filesize($file);
		$handle = fopen($file, "r");
		$content = fread($handle, $file_size);
		fclose($handle);
	
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$eol = PHP_EOL;
		   
			   
		   
		$to      = $data['passenger_details']->p_email_id;
		$subject = 'Rashmi Cabs';
				
		$from_name = "Rashmi Cabs";
		$from_mail = 'rashmicabs@gmail.com';
		$replyto = "rashmicabs@gmail.com";
			
		// Basic headers
		$header = "From: ".$from_name." <".$from_mail.">".$eol;
		$header .= "Reply-To: ".$replyto.$eol;
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";
			
		// Put everything else in $message
		//$message = "--".$uid.$eol;
		//$message .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
		$message .= "--".$uid.$eol;
		$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
		$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$message .= $body.$eol;
		$message .= "--".$uid.$eol;
		$message .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
		$message .= "Content-Transfer-Encoding: base64".$eol;
	    $message .= "Content-Disposition: attachment".$eol.$eol;
		$message .= $content.$eol;
		$message .= "--".$uid."--";
		//echo $message;exit;
							
		mail($to, $subject, $message, $header);
		
	}
	
}
