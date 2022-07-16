<?php
class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->model('admin_db','',TRUE);
		$this->load->helper('date');	
		$this->load->helper('string');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');					
		
		if($this->session->userdata('fxcaptrade_admin_logged_in'))		
		{
			redirect('adminarea', 'refresh');
		}
		else
		{
		}			
	}
	

	function index()
	{
			
			$this->load->view('adminarea/admin_login_form');
	}
	
	//login password checking

	public function admin_login_check()
	{
		//Field validation succeeded.  Validate against database
		
		$login_flag=FALSE;
		$login_active_flag=FALSE;
		$rootid = $this->input->post('rootid');
		$adminid = $this->input->post('adminid');
		$password = $this->input->post('password');
		
		//query the database
		 $result = $this->admin_db->admin_checking($rootid,$adminid,$password);
		
			if($result)
			{
              
			  $sess_array = array();
			  foreach($result as $row)
			  {
				$login_time = $row->currentdate;
				$sess_array = array(
				  'adminid' => $row->N_ID,
				  'adminrootid' => $row->C_CODE1,
				  'login_time' => $row->currentdate,
				  'adminname' => $row->C_NAME,
				  'type' => $row->C_TYPE
				);
				$this->session->set_userdata('fxcaptrade_admin_logged_in', $sess_array);
				$this->session->set_userdata($sess_array);
				redirect('adminarea');
			  }
			}else{
				$this->session->set_flashdata('msg', 'Invalid Root ID / Admin ID / Password');
				redirect(base_url().'admin');
			}
			
		/*	if($login_active_flag=TRUE)
			{		
			/*	$format = 'DATE_RFC822';
				$time = time();				
				$login_time = standard_date($format, $time); 
				$this->session->set_userdata('login_time', $login_time);
			*/	
				//login time updating 
			/*	$query_bclogin	=	"update bc_login set D_LAST_LOGIN='$login_time' where PC_USERNAME='$rootid'";
				$this->db->trans_begin();
				$this->db->query($query_bclogin);
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
				}	
											
			  return TRUE;
			}
			else
			{
			  $this->form_validation->set_message('login_check', 'Invalid Track Id (User is expired / Disabled');
			  return FALSE;
			}	
			*/		

	}	
		
}
?>