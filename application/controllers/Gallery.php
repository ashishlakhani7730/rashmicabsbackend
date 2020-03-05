<?php 

class Gallery extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check is if user was not logged in that redirect to the login page 
		$user = $this->session->has_userdata('user');
		if(empty($user)){
			redirect('index.php/Login');
		}
 		$this->load->helper('form');
 		$this->load->model('General_data');
	/*	$config['allowed_types'] = 'gif|jpg|png|jpeg'; 				
		$config['upload_path']   = './uploads/gallery';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);*/
		

	}
	public function index()
	{

		$data['gallery_list'] = $this->db->select("*")->from("gallery")->get()->result(); 
		$this->load->view('manage_gallery', $data); 
		
	}
	public function add_gallery()
	{
		
		if($post = $this->input->post())
		{
			unset($post['submit']);
			/*if($this->upload->do_upload('g_image'))
			{
						$data=$this->upload->data();
						$post['g_image']= $data['raw_name'].$data['file_ext'];

						echo "<pre>"; 
						print_r($data); exit;
			}*/
				/*if($this->upload->do_upload('g_image'))
				{*/	
						if($this->db->insert('gallery', $post))
						{
							$get_last_id=$this->db->insert_id();

							$this->General_data->uploadImage('./uploads/gallery',$get_last_id,'RSCG0','gallery','g_image');	

							$this->session->set_flashdata("feedback","gallery added successfully");
							$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-success');

							
						}
						else
						{
							$this->session->set_flashdata("feedback","some problem to add try again.");
							$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-danger');
						}
						redirect('index.php/Gallery');
					/*}else
					{
							$upload_error=$this->upload->display_errors();
							echo $upload_error; exit;
							$this->session->set_flashdata("feedback","error to upload image please try again");
							$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-danger');
						redirect('index.php/Gallery');
					}*/
		}
		else
		{
			$this->load->view('add_in_gallery');
		}
	}
	public function delete_gallery()
	{
		$post= $this->input->post();
		
		if($this->db->delete('gallery', ['id'=>$post['delete_id']]))
		{
			$this->session->set_flashdata("feedback","gallery deleted successfully");
			$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-success');
		}
		else
		{
			$this->session->set_flashdata("feedback","some problem to delete try again.");
			$this->session->set_flashdata('feedback_class','alert alert-dismissible alert-danger');
		}
		redirect('index.php/Gallery');
	}
}