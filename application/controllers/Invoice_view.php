<?php defined('BASEPATH') OR exit('No direct script access allowed');
define('BACKUP_DIR', './uploads/invoice' ) ;

class Invoice_view extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
	    $this->load->model('State_city_model');		
        $this->load->model('General_data');
		$this->load->library('session');
		date_default_timezone_set('Asia/Kolkata');
		
    }

	public function index()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
           $id = $_POST['ticket_id'];
		   
		    $data['invoice'] = $this->db->get_where('invoice',array('id'=>$id))->row();
		   
			$rent_card_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row()->b_rent_card_id;
			
			$data['rent_card'] = $this->db->get_where('rent_cards',array('id'=>$rent_card_id))->row();
			
			$booking_details = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		   
		   	if($booking_details->b_ac_non_ac==1)
			{
		   		$data['ac_non_ac'] =  'AC';
		   	}
			else
			{
				
				$data['ac_non_ac'] =  ' NON AC';
				
			}
			$data['booking_details'] = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
			
			$this->load->view('invoice_view_local', $data);
			
		}

	}	
	
	public function invoice_view_local_ex()
	{
		
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
           $id = $_POST['ticket_id'];
		   
		    $data['invoice'] = $this->db->get_where('invoice',array('id'=>$id))->row();
		   
			$rent_card_id = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row()->b_rent_card_id;
			
			$data['rent_card'] = $this->db->get_where('rent_cards',array('id'=>$rent_card_id))->row();
			
			$booking_details = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
		   
		   	if($booking_details->b_ac_non_ac==1)
			{
		   		$data['ac_non_ac'] =  'AC';
		   	}
			else
			{
				
				$data['ac_non_ac'] =  ' NON AC';
				
			}
			$data['booking_details'] = $this->db->get_where('booking_list',array('b_invoice_id'=>$id))->row();
			
			$this->load->view('invoice_view_local_ex', $data);
			
		}

	}
	
	public function invoice_link()
	{
	
		if(isset($_POST['ticket_id']))
		{
			$id = $_POST['ticket_id'];		   
		   
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
			
		
		    $this->load->view('link_invoice_view', $data);
			
		}
	
	}	
	
	public function outstation_invoice()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
		
           $id = $this->input->post('ticket_id');
		   
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
			
			//echo "<pre>"; print_r($data); exit;
		    $this->load->view('invoice_view',$data);
			
		}

	}
	public function outstation_invoice_without()
	{
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
		
           $id = $this->input->post('ticket_id');
		   
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
			
			//echo "<pre>"; print_r($data); exit;
		    $this->load->view('invoice_view_ex',$data);
			
		}

	}
	public function InvoiceMail()
	{
		//$id = 52;
		   
		//echo $id; exit;		   
	
		$id=$_POST['invoice_id'];
		
		   
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
			
		
		if($data['invoice']->type=="LOCAL" || $data['invoice']->sub_type=="ONEWAY") {
			$invoice_template=$this->load->view('invoice_view_local_pdf',$data,true);
		}else if($data['invoice']->sub_type=="ONEWAY OFFER" || $data['invoice']->sub_type=="ROUNDTRIP" || $data['invoice']->sub_type=="MULTICITY") {
			$invoice_template=$this->load->view('invoice_view_pdf',$data,true);
		}
		
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
		//echo $message_mail;exit;
			
			
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
							
		mail($to, $subject, $message, $header);
		
		$msg['success'] = "Invoice Successfully Mailed";
		$this->session->set_flashdata('success',$msg);
		if($data['invoice']->type=="LOCAL" || $data['invoice']->sub_type=="ONEWAY") {
			$this->load->view('invoice_view_local',$data);
		}else if($data['invoice']->sub_type=="ONEWAY OFFER" || $data['invoice']->sub_type=="ROUNDTRIP" || $data['invoice']->sub_type=="MULTICITY") {
			$this->load->view('invoice_view',$data);
		}
		
	}
	
} ?>