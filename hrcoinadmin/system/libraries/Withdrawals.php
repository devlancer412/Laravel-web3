<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdrawals extends CI_Controller {

	 
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');	
			$this->load->model('admin_db','',TRUE);
			$this->load->model('login_db','',TRUE);
			$this->load->helper('date');
			$this->load->helper('text');
			$this->load->helper('html');
			$this->load->library('email');
			$this->load->helper('url');	
			$this->load->helper('string');
			$this->load->helper('security');
			$this->load->library('excel');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');				
			
			if($this->session->userdata('fxcaptrade_admin_logged_in'))		
			{
		  
			}
			else
			{
			  //If no session, redirect to login page
			  redirect('admin_login', 'refresh');
			}			
			
		}	 
	 
		public function index()
		{
		
				$page="Members Area";
				$data['title'] = ucfirst($page); // Capitalize the first letter
			    $data['d_date']=$this->input->post('d_date');
				$this->load->view('adminarea/header', $data);
				$this->load->view('adminarea/withdraw_details', $data);
				$this->load->view('adminarea/footer', $data);				  
			

		}
		
		public function send_mail()
		{
		 $id=$this->input->post('checkid');	
		 $count_id=count($id);
		 for($i=0;$i<$count_id;$i++)
		 {
			 
			 $sql="select a.n_id,a.d_transcation,a.n_trans_amount,b.C_FNAME,b.C_EMAIL from bank_withdrawals a,address_dtl b where a.n_id=b.n_id and a.n_slno='$id[$i]'";
			 $query=$this->db->query($sql);
			 $result=$query->result();
			 if($result)
			 {
				 foreach($result as $row)
				 {
					
					 $nid=$row->n_id;
					 $email_to=$row->C_EMAIL;
					 $name=$row->C_FNAME;
					 $t_date=$row->d_transcation;
					 $transaction_date=date('d-m-Y',strtotime($t_date));
					 $amount=$row->n_trans_amount;
			$sql123="select sum(n_amount) n_amount from activation_master where c_status='Y' and n_id='$nid'";
			 $query=$this->db->query($sql123);
			 $result123=$query->result();
			 if($result123)
			 {
				 foreach($result123 as $row123)
				 {	
				 $sum_amount=$row123->n_amount;
				
				 }

			 }	

			 
				
		
			 $sql223="select sum(n_trans_amount) trans_amount from bank_withdrawals where c_status='Y' and n_id='$nid' and d_transcation<'$t_date'";
		
			$query=$this->db->query($sql223);
			 $result223=$query->result();
			 if($result223)
			 {
				 foreach($result223 as $row223)
				 {	
				 $sum_before=$row223->trans_amount;
				
				 }

			 }				 
		else{
			$sum_before=0;

			}	

					//MAIL SENDING
					$mailcontent='<!DOCTYPE html>
		<html>
		  <head>
			<meta charset="utf-8">
			<title>Bitcoin withdrawal receipt</title>
		  </head>
		  <body><article style="background: white;">
		   <div class="logo" style=" background: #253d4a;">
			<div class="jhg" style="width: 100%;
			background: #253d4a;
			z-index: 1000;
			position: absolute;
			padding: 9px 0px;"> <img alt="Logo" title="Logo" style="display:block" width="200" height="87" 
		 src="https://www.fxcaptrade.com/assets/frontarea/img/minilogo.png"></div>
		   </div>
		<div class="conatent" style=" position: relative;
			z-index: 1000;
			margin: 0 auto;
			top: 13%;
			text-align: center;
			left: 2px;">
		<div class="add" style="text-align: justify;
			width: 68%;
			margin: 0 auto;"><p style="    font-weight: bolder;
			font-size: 18px;
			margin-bottom: 6px;">FX CAP TRADE</p> 
		  <p style="font-size: 13px; margin-bottom: 6px;   font-weight: 600;"> support@fxcaptrade.com</p>
		  <p style=" font-size: 13px; margin-bottom: 6px;   font-weight: 600;">
		www.fxcaptrade.com</p>
		</div>
		<br><br><br><br><br><br>
		
		<div class="add" style="text-align: justify;
			width: 68%;
			margin: 0 auto;">
			<p>Bitcoin withdrawal receipt<br>
			Date :'.$transaction_date.'</p>
		<p style="    margin-bottom: 14px;
			font-size: 17px;">Dear Mr '.$name.'</p>
			<p style="    margin-bottom: 14px;
			font-size: 17px;">Greetings for the day!</p>
		  <p> <span >
As per the business negotiations between you and the company, the $'.$amount.' Dollar is transferred to your wallet. Please note that this amount is calculated after deducting the value that is already given to you. </span></p>
		<br><br>
		<br>
		<p style="font-weight: bold;
			margin-bottom: 10px;">Your total investment amount:'.$sum_amount.' </p>
		<p style="font-weight: bold;
			margin-bottom: 10px;">Amount received before:'.$sum_before.' </p>
		
		<br><br><br>
		<p>Kindly get back to us if any further concerns.</p>
		<br><br><br>
		<p>
		<a href="https://www.fxcaptrade.com/login">https://www.fxcaptrade.com/login</a></p>
		</div>
		</div>
		<address style=" position: absolute;
		  bottom: 8mm;
		  right: 20mm;">
		<p>Thank you, FX Cap trade</p>
		<p> <span></span>support@fxcaptrade.com<br>
				</p>
			  </address>
			</article>
		  </body>
		</html>';



		$this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
       $mail->isSMTP();
        //$mail->SMTPDebug = 2;
        $mail->Host     = 'cp02.lotbithosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'support@fxcaptrade.com';
        $mail->Password = 'qHZXC5SuNCwPhh';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587; 
        $mail->SMTPKeepAlive = true;
        $mail->Mailer = "smtp";        
        $mail->setFrom('support@fxcaptrade.com', 'fxcaptrade');
        $mail->addReplyTo('support@fxcaptrade.com', 'fxcaptrade');
        
        // Add a recipient
        $mail->addAddress('mebyxavier@gmail.com');
        $mail->addBCC('mebyxavier@gmail.com');    
        // Email subject
        $mail->Subject = 'Login details from fxcaptrade';
        
        // Set email format to HTML
        $mail->isHTML(true);
    
        $mail->Body = $mailcontent;
        
        // Send email
        if(!$mail->send()){
			
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        } 
					 
					 
			 
					 
					 
				 }
			 }
			 
			 
		 }
			
		}
	
		
	
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */