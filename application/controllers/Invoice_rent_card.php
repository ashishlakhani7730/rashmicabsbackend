<?php defined('BASEPATH') OR exit('No direct script access allowed');
define('BACKUP_DIR', './uploads/duty_slip' ) ;

class Invoice_rent_card extends CI_Controller {
    
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
		if(empty($user))
		{
			redirect('Login');
		}
		else
		{
		
            $data = $this->input->post(NULL,TRUE);
			//echo "<pre>"; print_r($data); exit;
			$id = $data['view_id'];				
			
			$booking_data = $this->db->get_where('booking_list',array('id'=>$id))->row_array();			
					
			date_default_timezone_set('Asia/Kolkata');
			
			if($booking_data['b_rent_card_id'] == 0)
			{
				if($this->input->post('return_time')=="")
				{
					$return_time = "";
				}
				else
				{
					$return_time = date("H:i a", strtotime($this->input->post('return_time')));
					
					$night_charge = $booking_data['b_pk_night_charge'];
										
					$date = new DateTime($this->input->post('return_time'));
					
					$dt2=$date->format('G');	
		
								if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==0 or $dt2==5)
								{
									$drop_night = $night_charge;
									$n='';
									$drop_night_charge_status=1;
								}
								else
								{
									$drop_night = 0;
									$n='<span class="text-danger">Not Applied</span>';
									$drop_night_charge_status=0;
								}
					
				}
				$rent_cards_data  = array(
				    'r_id'=>$booking_data['b_id'],					
					'r_start_date'=>date("Y-m-d", strtotime($this->input->post('start_date'))),
					'r_return_date'=>date("Y-m-d", strtotime($this->input->post('return_date'))),
					'r_start_time'=>date("H:i a", strtotime($this->input->post('start_time'))),
					'r_return_time'=>$return_time,					
					'r_start_km'=>$this->input->post('start_km'),
					'r_return_km'=>$this->input->post('return_km'),
					'r_reffered_by'=>$this->input->post('reffered_by'),
					'r_other_details'=>$this->input->post('other_details'),
					'r_created_date_time'=>date("Y-m-d H:i:s")
				);					
				//print_r($rent_cards_data);exit;	
				$this->db->insert('rent_cards',$rent_cards_data);					
							
				//if($this->input->post('r_start_km')==""  || $this->input->post('r_return_km')=="" )
				if($this->input->post('return_date')==""  || $this->input->post('return_time')=="" || $this->input->post('start_km')==""  || $this->input->post('return_km')=="" )
				{
					$rent_card_status = 0;
				}
				else
				{
					$rent_card_status = 1;
				}					
					
				$this->db->where('id',$id);
				$this->db->update('booking_list',array('b_rent_card_id'=>$this->db->insert_id(),'b_rent_card_status'=>$rent_card_status, 'b_drop_night_charge_status'=>$drop_night_charge_status, 'b_drop_night_charge'=>$drop_night));
			}
			else
			{
				if($this->input->post('return_time')=='')
				{
					$return_time='';
				}
				else
				{
					$return_time=date("H:i a", strtotime($this->input->post('return_time')));
					
					$night_charge = $booking_data['b_pk_night_charge'];
										
					$date = new DateTime($this->input->post('return_time'));
					
					$dt2=$date->format('G');	
		
								if($dt2==24 or $dt2==1 or $dt2==2 or $dt2==3 or $dt2==4 or $dt2==0 or $dt2==5)
								{
									$drop_night = $night_charge;
									$n='';
									$drop_night_charge_status=1;
								}
								else
								{
									$drop_night = 0;
									$n='<span class="text-danger">Not Applied</span>';
									$drop_night_charge_status=0;
								}
				}
				$rent_cards_data  = array(
					'r_start_date'=>date("Y-m-d", strtotime($this->input->post('start_date'))),
					'r_return_date'=>date("Y-m-d", strtotime($this->input->post('return_date'))),
					'r_start_time'=>date("H:i a", strtotime($this->input->post('start_time'))),
					'r_return_time'=>$return_time,					
					'r_start_km'=>$this->input->post('start_km'),
					'r_return_km'=>$this->input->post('return_km'),
					'r_reffered_by'=>$this->input->post('reffered_by'),
					'r_other_details'=>$this->input->post('other_details'),
					'r_created_date_time'=>date("Y-m-d H:i:s")
				);
					
				$this->db->where('id',$booking_data['b_rent_card_id']);
				$this->db->update('rent_cards',$rent_cards_data);	
				
				
				if($this->input->post('return_date')==""  || $this->input->post('return_time')=="" || $this->input->post('start_km')==""  || $this->input->post('return_km')=="" ) 
				{
					$rent_card_status = 0;
				}
				else
				{
					$rent_card_status = 1;
				}
				
				$this->db->where('id',$id);
				$this->db->update('booking_list',array( 'b_rent_card_status'=>$rent_card_status,
															  'b_drop_night_charge_status'=>$drop_night_charge_status,
															  'b_drop_night_charge'=>$drop_night));
			}
				
					
			
			
			
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.id',$id);
			$data['booking_data'] = $this->db->get()->row();
		
			
		
			$data['rent_cards']=$this->db->get_where('rent_cards',array('id'=>$data['booking_data']->b_rent_card_id))->row();
			
		//echo "<pre>";print_r($data);exit;	
     	$this->load->view('invoice_rent_card', $data);
		}
	}
	
	public function view_rent_card()
	{
	
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('Login');
		}else{
            $id = $_POST['view_id'];
			
			//echo $id; exit;
			
			$booking_data = $this->db->get_where('booking_list',array('id'=>$id))->row_array();
			
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.id',$id);
			$data['booking_data'] = $this->db->get()->row();
		
			
		
			$data['rent_cards']=$this->db->get_where('rent_cards',array('id'=>$data['booking_data']->b_rent_card_id))->row();
			
			
        	 $this->load->view('invoice_rent_card', $data);
		}
		
	}
	
	public function RentCardMail()
	{
		//$id = 52;
		   
		//echo $id; exit;		   
	
		$id = $_POST['view_id'];
			
			//echo $id; exit;
			
			$booking_data = $this->db->get_where('booking_list',array('id'=>$id))->row_array();
			
			$this->db->select('booking_list.*,package_type.package_sub_type,package_type.package_type,city_detail.c_name');
			$this->db->from('booking_list');
			$this->db->join('package_type','package_type.id=booking_list.b_type');
			$this->db->join('city_detail','city_detail.id=booking_list.b_from_city');
			$this->db->where('booking_list.id',$id);
			$data['booking_data'] = $this->db->get()->row();
		
			
		
			$data['rent_cards']=$this->db->get_where('rent_cards',array('id'=>$data['booking_data']->b_rent_card_id))->row();
			
			$data['passenger_details']=$this->db->get_where('passenger_list',array('id'=>$data['booking_data']->b_p_id))->row();
			
			
			$invoice_template=$this->load->view('invoice_rent_card_pdf',$data,true);
		
		
		//echo $invoice_template;exit;
			
			
		//generate pdf
		if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0755) ;
        if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0755) ;
			
		$pdfFilePath = BACKUP_DIR."/duty_slip.pdf";
	 
		//load mPDF library
		$this->load->library('m_pdf');
	 
		//generate the PDF from the given html
		$this->m_pdf->pdf->WriteHTML($invoice_template);
	 
		//download it.
		$this->m_pdf->pdf->Output($pdfFilePath, "F");  
			
					
		$body = $this->load->view('mail_booking_duty_slip',$data,true);
		//echo $body;exit;
			
			
		$filename= "duty_slip.pdf";
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
		
		
		$msg['success'] = "Duty Slip Successfully Mailed";
		$this->session->set_flashdata('success',$msg);
		$this->load->view('invoice_rent_card', $data);
		
	}
	
	
	
} ?>