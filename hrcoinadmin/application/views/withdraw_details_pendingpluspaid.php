<?php
$id=$this->session->userdata('id');
$d_date=$this->input->post('d_date');
$d_trans_date=date('Y-m-d',strtotime($d_date));
/*

			$wallet_transferslno=0;

			$sql="SELECT MAX(n_slno) N_SLNO FROM pending_wallet_transcation_master";

			$result = $this->admin_db->get_results($sql);			

			if($result)

			{

			  $sess_array = array();

			  foreach($result as $row)

			  {

					$wallet_transferslno = $row->N_SLNO;

			  }

			}
			
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
						
			$count=0;
			$sqlfrom= "SELECT n_id,n_trans_amount FROM bank_withdrawals where d_transcation='2020-07-04' ";
			$result1 = $this->admin_db->get_results($sqlfrom);
			if($result1)
			{
			  $sess_array = array();
			  foreach($result1 as $row1)
			  {
					 $count++;
					 $n_id = $row1->n_id;	
					  $n_trans_amount = $row1->n_trans_amount;
				  
					$pending_amount = 0;$total_withdraw=0;
					$sqlfrom= "SELECT n_amount FROM pending_income_master where n_id ='$n_id'";
					$result1 = $this->admin_db->get_results($sqlfrom);
					if($result1)
					{
					  $sess_array = array();
					  foreach($result1 as $row1)
					  {
						  $pending_amount = $row1->n_amount;		
					  }
					}
					$total_withdraw=$n_trans_amount+$pending_amount;
				  
												
						
			echo			$query_bank_withdrawals	="insert into bank_withdrawals_pendingpaid (n_id,n_trans_amount,d_transcation,c_status) values 	($n_id,$total_withdraw,'$currentdate','Y')";

				 		 $this->db->query($query_bank_withdrawals);			
						 
						///////////////////////// 
						 if($pending_amount>0){
							 
							if($transactionid >	0)
								$transactionid=$transactionid+1;
							else
								$transactionid=1;
								
					if($wallet_transferslno >0)
						$wallet_transferslno=$wallet_transferslno+1;
					else
						$wallet_transferslno=1;																	 
							 
							$walletamount_aftertranscation=0;
							$query_transcation_master	="insert into pending_wallet_transcation_master (N_SLNO,n_transcation_no,n_from_id,n_to_id,n_accbalance_before,n_trans_amount,n_accbalance_after,d_transcation,c_trans_type,c_status) values 	 

					 ('$wallet_transferslno','$transactionid',$n_id,'-1',$pending_amount,$pending_amount,					 $walletamount_aftertranscation,'$currentdate','Pending withdrawal','Y')";

							$this->db->query($query_transcation_master);		

							$query_wallet_master	=	"update pending_income_master set N_AMOUNT='$walletamount_aftertranscation' where n_id=$n_id ";	
							$this->db->query($query_wallet_master);								 
							 							 
							 
							 
						 }		
						 				 
						
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
*/
			$count=0;
			$sqlfrom= "SELECT n_id,n_trans_amount FROM bank_withdrawals where d_transcation='2020-07-04' ";
			$result1 = $this->admin_db->get_results($sqlfrom);
			if($result1)
			{
			  $sess_array = array();
			  foreach($result1 as $row1)
			  {
					$count++;
					$n_id = $row1->n_id;	
					$n_trans_amount = $row1->n_trans_amount;
						
			echo	$query_bank_withdrawals	="update bank_withdrawals_pendingpaid set n_withdraw_amount='$n_trans_amount' where n_id='$n_id' and d_transcation='2020-07-04'";

				 	$this->db->query($query_bank_withdrawals);	
			  }
			}

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
?>

<div class="dashboard-wrapper">

  <div class="container-fluid">

    

 <div class="row gutter">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="panel panel-blue">



          <div class="panel-body">

           <div class="table-responsive">

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">

  <tr>

    <td width="50%">

<div class="form-group col-md-12">

            <label class="control-label" for="select01"><h3>Select date for Withdraw Details</h3></label>

            <div class="row gutter">

		<form role="form" name="form" id="form" method="post" action="<?php echo base_url() ?>withdrawals_pendingplusnew" >    

                         

            <div class="form-group col-md-4">

            <label class="control-label" for="focusedInput">From Date</label>

            <select id="datepicker" name="d_date" class="form-control">
			<option>select date</option>
			<?php
			 $sql="select distinct d_transcation  from bank_withdrawals order by d_transcation ";
			$query = $this->db->query($sql);

			$result = $query->result();
			if($result)
			{
				foreach($result as $row)
				{
					?>
					
					<option><?php echo date('d-m-Y',strtotime($row->d_transcation));?></option>
					
				<?php	
				}
				
			}
			
			?>
			
			</select>

            </div>

            

             <div class="form-group col-md-4" style="padding-top:30px;">

            		<button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>

              </div>                                                     

         

            </form>

          </div>  

          </div>        

</td>

  </tr>

  <tr>

    <td align="left"><div id="contentdiv">

</div></td>

    </tr>

</table>

</div>



          </div>

        </div>

      </div>

    </div>      

  </div>

  <?php if($d_date !=""){ ?>

   <div class="row gutter">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="panel">
		<div align="left">
          <div class="panel-heading">

            <h3>Withdrawals : <?php echo $d_date;?></h3>

          </div>
		  
		  </div>

          <div class="panel-body">

            <div class="tabbable tabs-left clearfix">

              <div class="tab-content">

			 <!------------------------------------tab one--------------------------------------------> 

				<div class="tab-pane active" id="tabOne">

				<div class="table-responsive">

				<table id="" class="display table table-striped table-bordered no-margin" cellspacing="0" width="100%">

				<thead>

				<tr>

					<th width="3%">Slno</th>

					<th width="5%">User ID</th>

					<th width="7%">Name</th>

					<th width="9%">Wallet</th>

					<th width="12%">Amount</th>
					
					<th width="14%"><div style="text-align:center"> Select all <input type="checkbox" id="checkAll" /></div></th>

				</tr>

				</thead>

				<tbody>

				<?php

				
					
					  $i=1;
					$sql1="SELECT a.n_slno,a.n_id,a.n_trans_amount,a.d_transcation,b.C_FNAME,b.c_wallet_address,c.c_username from bank_withdrawals_pendingpaid a,address_dtl b,bc_master c where a.n_id=b.n_id and a.n_id=c.pn_id and a.d_transcation='$d_trans_date'";

						$query = $this->db->query($sql1);

						$result1 = $query->result();

						if($result1)
						{

						foreach($result1 as $row1)

						{
                            $n_slno=$row1->n_slno;
							$id = $row1->n_id;
							$n_amount = $row1->n_trans_amount;
							$c_name = $row1->C_FNAME;
							$username=$row1->c_username;
							$wallet_address=$row1->c_wallet_address;
							
				?>                  

				<tr>

				<td height="52"><?php echo $i ?></td>

				<td><?php echo $username ?></td>

				<td> <?php echo $c_name ?></td>

				<td><?php echo $wallet_address;?></td>

				<td><?php echo $n_amount ?></td>
				
                 <td align="center" class="center" id="u_<?php echo $n_slno; ?>" ><input name="send_user" type="checkbox" id="<?php echo $n_slno; ?>" value="<?php echo $n_slno; ?>" class="check_class" /></td>
				
				
			
				

				

				

				

				</tr>



				<?php
				$i++;

				}

				}
				else
				{	

				?>   

				<?php        		

				}



				?>                   



				</tbody>

				</table>

				</div>

				</div>
				
				
				
				 <div class="form-group col-md-4" style="padding-top:30px;" align="right">

            		<button type="submit" id="submit_table" class="btn btn-primary">Submit</button>

              </div> 

				</div>

				</div>

				</div>

				</div>

				</div>

				</div>   

				</div>

				

				

			

				

				

  <?php } 
  
 ?>

</div>



<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminarea/css/jquery-ui.css">

  <script src="<?php echo base_url() ?>assets/adminarea/js/jquery-ui.min.js"></script>
 <script src='<?php echo base_url();?>assets/adminarea/js/jquery.prettyPhoto.js'></script>

         <link href="<?php echo base_url();?>assets/adminarea/css/prettyPhoto.css" rel="stylesheet" type="text/css" />


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  

  <script>
$(document).ready(function() {	
		
			$("#checkAll").click(function () {
    			 $('input:checkbox').not(this).prop('checked', this.checked);
 			});
			
			$('#submit_table').click(function(){
				
				var checks = [];
            $.each($("input[name='send_user']:checked"), function(){
                checks.push($(this).val());
            });
			
			if(checks=="")
			{
				swal("please select atleast one field");
				
			}	
			
			else
			{
				
				$.ajax({
				url : "<?php echo site_url(); ?>adminarea/Withdrawals/send_mail",
				type : "POST",
				
				data : {"checkid" : checks},
				success : function(data) {
					if(data==1)
					{
					swal("Mail Send Successfully");
					}
					else{
						
						swal("Some error occured");
					}
				},
				
                });
				
				
				
			}
				
			});
			});
  


</script>