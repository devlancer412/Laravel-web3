<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminarea extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');	
			$this->load->model('admin_db','',TRUE);
			$this->load->helper('date');
			$this->load->library('email');
			$this->load->helper('url');	
			$this->load->model('daily_distributor_calculation','',TRUE);
			$this->load->model('weekly_incentive_summary_calculation','',TRUE);
		//	$this->load->library('excel');
			$this->load->helper('string');
			$this->load->helper('security');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');							
			if($this->session->userdata('kmpl_admin_logged_in'))		
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
			if($this->session->userdata('kmpl_admin_logged_in'))		
			{
				$page="Members Area";
				$data['title'] = ucfirst($page); // Capitalize the first letter
			
				$this->load->view('adminarea/header', $data);
				$this->load->view('adminarea/dashboard', $data);
				$this->load->view('adminarea/footer', $data);				  
			}
			else
			{
			  //If no session, redirect to login page
			  redirect('admin_login', 'refresh');
			}	

		}
		
		public function dashboard()
		{

			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/mainpage', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function daily_thoughts()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/daily_thoughts', $data);
			$this->load->view('adminarea/footer', $data);				
		}		
		public function daily_thoughts_form()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/daily_thoughts_form', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function edit_daily_thoughts($thoughtsid)
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['thoughtsid'] = $thoughtsid;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/edit_daily_thoughts_form', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function news_entry_form()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/news_entry_form', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function edit_news($newsid)
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['newsid'] = $newsid;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/edit_news_form', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function news()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['newsid'] = $newsid;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/news', $data);
			$this->load->view('adminarea/footer', $data);				
		}
				
		public function calculation_select()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/calculation/calculation_select', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function daily_calculation_do()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/calculation/daily_binary_calculation', $data);
			$this->load->view('adminarea/footer', $data);		
		}				
			
		public function incentive_summery_calculation()
		{
			$data['keywords'] = "shopping India";
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/calculation/incentive_summery_calculation', $data);
			$this->load->view('adminarea/footer', $data);		
		}			
									
			
		public function franchisee_calculation_do()
		{
			$data['keywords'] = "shopping India";
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/calculation/daily_franchisee_calculation', $data);
			$this->load->view('adminarea/footer', $data);		
		}
		public function package_order_pending()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/product_ordered_pending_list', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function package_order_confirmed()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/product_ordered_confirmed_list', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function package_order_canceled()
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/product_ordered_canceled_list', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
//		public function gallery_create_step1()
//		{
//			$page="Reports";
//			$data['title'] = ucfirst($page); // Capitalize the first letter	
//			$this->load->view('adminarea/header', $data);
//			$this->load->view('adminarea/gallery_create', $data);
//			$this->load->view('adminarea/footer', $data);				
//		}	
		public function gallery_create_step1($message)
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['errormessage'] = $message;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/gallery_create', $data);
			$this->load->view('adminarea/footer', $data);				
		}		
		public function gallery_image_upload($message)
		{
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['errormessage'] = $message;
			$data['n_gallery_id'] = $message;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/gallery_image_upload', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function gallery_image_delete($galleryid,$imageid)
		{
			$this->db->trans_begin();	
			
			$query_image="update gallery_images set c_status='D' where n_category_id='$galleryid' and n_slno='$imageid'";		
			$this->db->query($query_image);	
					
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$successflag=FALSE;
			}
			else
			{
				$this->db->trans_commit();
				$successflag=TRUE;
			}
			
			$page="Reports";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data['errormessage'] = $message;
			$data['n_gallery_id'] = $galleryid;
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/gallery_image_upload', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		
		public function weekly_payout_excel()
    	{
				$textFormat='@';//'General','0.00','@'
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Events');
				$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				
				//$this->excel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode('0000');
				//$this->excel->getActiveSheet()->setCellValue("C", "Text");
				//$excel->getActiveSheet()->getStyle('C1')->getNumberFormat()->setFormatCode($textFormat);
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Upcoming event list');
				//$this->excel->getActiveSheet()->getColumnDimension('A1')->setWidth(10);
				 $this->excel->getActiveSheet()->setCellValue('A3', 'SL.NO.');
                $this->excel->getActiveSheet()->setCellValue('B3', 'NAME');
                $this->excel->getActiveSheet()->setCellValue('C3', 'S.B A/C NO.');
                $this->excel->getActiveSheet()->setCellValue('D3', 'AMOUNT');
				$this->excel->getActiveSheet()->setCellValue('E3', 'IFS CODE');
				$this->excel->getActiveSheet()->setCellValue('F3', 'BANK NAME');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:C1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
               // $this->excel->getActiveSheet()->getStyle('E3')->getFont()->setSize(16);
               // $this->excel->getActiveSheet()->getStyle('F3')->getFill()->getStartColor()->setARGB('#333');
				
               for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               }
                //retrive contries table data
                $events = $this->admin_db->get_payout_excel('2017-03-12');
				
                $exceldata="";$count=0;
                foreach ($events as $key=> $row){
					$count=$count+1;
					
				    foreach($row as $key=> $val)
					{
					 	$val = str_replace('<br>','   ',$val);
				     	$ar[$key] = strip_tags($val);
					}
                    $exceldata[] = $ar;
                }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');
                 
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                 
                $filename='eventlist'.date('Y-m-d').'.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
                 
    }
		public function prepaidcoupons_transfer()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/transfer_coupon_generation_step1', $data);
			$this->load->view('adminarea/footer', $data);	
			
/*			$this->db->trans_begin();
////////////////////////////////////////////		
//////BINARY PAYMENT QUALIFIED FINDING/////
///////////////////////////////////////	//
		 	$sql="SELECT n_id,N_PV,d_activation FROM activation_master WHERE N_PV >0 order by order_id ";	
			$query = $this->db->query($sql);
			$query -> num_rows();
			if($query -> num_rows() >0)
			{			
			   foreach ($query->result() as $row)
			   {
					$qualifiedid= $row->n_id;
					$d_activation= $row->d_activation;
					
					$sql2="SELECT SUM(N_PV) N_PV FROM activation_master WHERE d_activation<='$d_activation' and n_id= $qualifiedid";	
					$query2 = $this->db->query($sql2);
					$query2 -> num_rows();
					if($query2 -> num_rows() >0)
					{			
					   foreach ($query2->result() as $row2)
					   {					
							$n_coupon_pv = $row2->N_PV;
						}
					}
					if($n_coupon_pv>=0){
			echo			$query_activation1 ="update bc_master set C_TFLAG='Y',D_ACTIVATED='$d_activation' where pn_id='$qualifiedid' and C_TFLAG='N'  ";
						$this->db->query($query_activation1);
					}							
					
					if($n_coupon_pv>=15){
				echo		$query_activation ="update bc_master set C_AFLAG='Y',C_PAYMENT_QUALIFIED='Y',D_PAYMENT_QUALIFIED='$d_activation' where pn_id='$qualifiedid' and C_PAYMENT_QUALIFIED='N'  ";
						$this->db->query($query_activation);
					}					
			   }
			}
////////////////////////////////////////////		
//////BINARY PAYMENT QUALIFIED FINDING/////
///////////////////////////////////////	//		
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$successflag=FALSE;
			}
			else
			{
				$this->db->trans_commit();
				$successflag=TRUE;
			}*/							
		}
		/////////VIPI
		
		public function document_user()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/document_user', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function document_user_list()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data = $this->input->post(NULL,TRUE);
			$this->load->view('adminarea/document_user_list', $data);
		}	
		public function approve_payment_details()
		{
			$approve_users = $this->input->post('approve_users');
				if(is_array($approve_users) && count($approve_users)>0){
					foreach($approve_users as $users){
						$query_bank_approval	="update address_dtl set C_APPROVE='Y' where n_id=$users ";		  	  
					 $this->db->query($query_bank_approval);
					}
				}
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					echo "error";
				}
				else
				{
					$this->db->trans_commit();
					echo "success";
				}	
		}
		public function document_user_approved()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/document_user_approved', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function document_user_approved_list()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$data = $this->input->post(NULL,TRUE);
			$this->load->view('adminarea/document_user_approved_list', $data);
		}
		public function wallet_user_list()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/wallet_user_list', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		public function update_wallet_master()
		{
			
			ini_set('max_execution_time', 0); 
			ini_set('memory_limit','2048M');
			$this->db->trans_begin();
			$ddate = "";
			$n_amount = 0;
			$fromuserid = "";
			$fromname = "";
			$count=0;$n_accbalance_before=0;$n_trans_amount=0;$n_accbalance_after=0;
			$withdraw_amount=0;$newn_trans_amount=0;
			$userstatus="Registered user";$activecoupon="";$actvatedddate="";$activecoupon=0;
			$C_PAN=$C_BRANCH=$C_BANK=$C_ACC_NO=$C_IFC_CODE=$C_PANCARD_FILE=$C_ADHAAR_FILE="";
	   
	    $transactionid=0;
	 		$sql="SELECT val  FROM maxtab where id='TRANSCATIONID' ";
			$query = $this->db->query($sql);
			$query -> num_rows();
			if($query -> num_rows() >0)
			{			
			   foreach ($query->result() as $row)
			   {
					$transactionid = $row->val;
			   }
			}				

			$wallet_transferslno=0;
			$sql="SELECT MAX(n_slno) N_SLNO FROM wallet_transcation_master";
			$result = $this->admin_db->get_results($sql);			
			if($result)
			{
			  $sess_array = array();
			  foreach($result as $row)
			  {
					$wallet_transferslno = $row->N_SLNO;
			  }
			}	
			 $sqlfrom= "SELECT b.N_ID,c_username,N_REF_ID,b.C_FNAME,b.C_LNAME,b.C_MOBILE,b.C_ADDRESS1,b.C_ADDRESS2,D_JOIN_TIME,
			D_ACTIVATED,b.C_PAN,b.C_BANK,b.C_BRANCH,b.C_ACC_NO,b.C_IFC_CODE,b.C_PANCARD_FILE,b.C_ADHAAR_FILE,b.C_APPROVE,c.n_amount FROM 
			bc_master a,address_dtl b,wallet_master c where a.pn_id=b.n_id and b.n_id=c.n_id and c.n_amount>100 and b.C_APPROVE='Y' ";	
			
						$result2 = $this->admin_db->get_results($sqlfrom);
						if($result2)
						{
						  $sess_array = array();
						  foreach($result2 as $row2)
						  {
							
			
			$wallet_transferslno=$wallet_transferslno+1;	
	   				if($transactionid >	0)
							$transactionid=$transactionid+1;
						else
							$transactionid=1;	
							
							  $count++;
								$fromusername = $row2->c_username;
								$N_ID = $row2->N_ID;
								//$n_to_id = $row2->n_to_id;
								$n_amount = $row2->n_amount;						
								$walletamount_aftertranscation=fmod($n_amount,100);
								$withdraw_amount=$n_amount-$walletamount_aftertranscation;
						date_default_timezone_set('Asia/Kolkata');
    					$curdate= date('Y-m-d H:i:s'); 
					$query_transcation_master	="insert into wallet_transcation_master (N_SLNO,n_transcation_no,n_from_id,n_to_id,
					n_accbalance_before,n_trans_amount,n_accbalance_after,d_transcation,c_trans_type,c_status,c_delivery_status) values 	 
					 ('$wallet_transferslno','$transactionid',$N_ID,'-1',$n_amount,$withdraw_amount,
					 $walletamount_aftertranscation,'$curdate','Bank withdrawal','Y','Processing')";
				  $this->db->query($query_transcation_master);		
				  
		$query_wallet_master	=	"update wallet_master set N_AMOUNT='$walletamount_aftertranscation' where n_id=$N_ID ";	
		  $this->db->query($query_wallet_master);	
						  }
						}
						
	 $query_maxtabbcmaster	=	"update maxtab set val='$transactionid' where id='TRANSCATIONID'";
	$this->db->query($query_maxtabbcmaster);
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$successflag=FALSE;
			}
			else
			{
				$this->db->trans_commit();
				$successflag=TRUE;
			}		
				$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/update_wallet_master_view', $data);
			$this->load->view('adminarea/footer', $data);		
		}	
		
		public function wallet_full_list()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/update_wallet_master_view', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
				
		public function wallet_user_pending_list()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/wallet_user_pending_list', $data);
			$this->load->view('adminarea/footer', $data);				
		}	
		
		public function shopping_point_transfer()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/shoppingpoint_transfer_step1', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		
		public function transfered_shopping_point()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/shoppingpoint_wallet_transaction', $data);
			$this->load->view('adminarea/footer', $data);				
		}		
		public function activation_point_transfer()
		{
			$page="Calculation";
			$data['title'] = ucfirst($page); // Capitalize the first letter	
			$this->load->view('adminarea/header', $data);
			$this->load->view('adminarea/activation_point_transfer_step1', $data);
			$this->load->view('adminarea/footer', $data);				
		}
		public function kmpl_testing()
		{
			$sql="SELECT n_id,d_activation,N_PV FROM activation_master where N_PV>0 order by d_activation";	
			$query = $this->db->query($sql);
			$query -> num_rows();
			if($query -> num_rows() >0)
			{			
			   foreach ($query->result() as $row)
			   {
				   	$userid=0;$d_activation="";$couponpv=0;
					$userid= $row->n_id;
					$couponpv= $row->N_PV;
					$d_activation= $row->d_activation;
					
					$current_plan ="";
					$sqlbcmaster2 = "SELECT c_plan FROM bc_master WHERE pn_id= $userid";
					$query2 = $this->db->query($sqlbcmaster2);
					$query2 -> num_rows();
					if($query2 -> num_rows() >0)
					{			
					   foreach ($query2->result() as $row2)	
					   {	
						$current_plan = $row2->c_plan;
					  }
					}					
					
					$total_pv = 0;					  
					$sqlbcmaster2 = "SELECT SUM(N_PV) n_coupon_pv FROM activation_master WHERE d_activation<='$d_activation' and n_id= $userid";
					$query2 = $this->db->query($sqlbcmaster2);
					$query2 -> num_rows();
					if($query2 -> num_rows() >0)
					{			
					   foreach ($query2->result() as $row2)	
					   {						  			
						$total_pv = $row2->n_coupon_pv;
					  }
					}			
			
						if($total_pv=="")
							$total_pv=0;						
						
						$plan="";
						$planid=0;
						if($total_pv>=15 && $total_pv<30){
							$plan="Plan1";
							$planid=1;
						}
						else if($total_pv>=30 && $total_pv<60){
							$plan="Plan2";
							$planid=2;
						}
						else if($total_pv>=60 && $total_pv<120){
							$plan="Plan3";
							$planid=3;
						}
						else if($total_pv>=120 && $total_pv<250){
							$plan="Plan4";
							$planid=4;
						}												
						else if($total_pv>=250){
							$plan="Plan5";
							$planid=5;
						}else{
							$plan="Plan0";
						}
				//		echo $current_plan."kk".$plan;
						if($current_plan !=	$plan){						
			
   		echo    $sqlgt_bc_master = "update bc_master set c_plan='$plan',d_plan_date='$d_activation' WHERE pn_id = $userid ";
				//---------- execution process  -----------//					
				$this->db->query($sqlgt_bc_master);																
				//---------- execution process  -----------//	
		echo		$sqlgt_designation_details = "insert into  designation_details (n_id,c_designation,d_designation,n_designation_id)
				values ('$userid','$plan','$d_activation','$planid')";
				$this->db->query($sqlgt_designation_details);		
				
						}
						
						if($couponpv>0){
								$query_activation	="update bc_master set C_TFLAG='Y' where  C_TFLAG='N' and pn_id='$userid'  ";						$this->db->query($query_activation);			

						}							
						
						if($total_pv>=15){		
									echo    $sqlgt_bc_master = "update bc_master set C_TFLAG='Y',C_AFLAG='Y',C_PAYMENT_QUALIFIED='Y',D_PAYMENT_QUALIFIED='$d_activation' WHERE C_PAYMENT_QUALIFIED='N' and pn_id = $userid ";
					//---------- execution process  -----------//					
					$this->db->query($sqlgt_bc_master);			
						
						}
				
			   }
			}
			
			
/*			$sql="SELECT pn_id,D_PAYMENT_QUALIFIED FROM bc_master_120118 WHERE C_TFLAG='Y' AND C_AFLAG='Y' AND C_PAYMENT_QUALIFIED='Y'";	
			$query = $this->db->query($sql);
			$query -> num_rows();
			if($query -> num_rows() >0)
			{			
			   foreach ($query->result() as $row)
			   {
				   	$userid=0;$d_activation="";
					$userid= $row->pn_id;
					$d_activation= $row->D_PAYMENT_QUALIFIED;
					
					
			echo    $sqlgt_bc_master = "update bc_master set C_TFLAG='Y',C_AFLAG='Y',C_PAYMENT_QUALIFIED='Y',D_PAYMENT_QUALIFIED='$d_activation' WHERE pn_id = $userid ";
					//---------- execution process  -----------//					
					$this->db->query($sqlgt_bc_master);			
			   }
			}*/
					
								
						
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$successflag=FALSE;
			}
			else
			{
				$this->db->trans_commit();
				$successflag=TRUE;
			}			
						
		}																																										
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */