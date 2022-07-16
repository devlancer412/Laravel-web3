<?php
define('new_path', 'https://keralaeshoppe.com/hrcoinadmin/');

		$name = "";$address = "";$pincode = "";	$country = "";$state = "";	$teleno = "";

		$mobile = "";$email = "";$bankname = "";$branchname = "";$accounttype = "";	$accountno = "";

		$capan = "";$ifccode = "";$passportno = "";	$visano = "";$country="";$district = "";

		$first_name = "";

	 $sql="select PN_ID,c_username from bc_master where c_username='$pc_username' ";

		$result = $this->admin_db->get_results($sql);		

		$sideflag = TRUE;

		if($result)
		{

		  $sess_array = array();

		  foreach($result as $row)
		  {
				$login_flag=TRUE;
				$id = $row->PN_ID;
				$c_username = $row->c_username;
		  }

		}	

		

		$c_password = "";

		$sql="select C_PASSWORD from bc_login where pc_username='$pc_username' OR pc_username='$c_username' ";

		$result = $this->admin_db->get_results($sql);		

		$sideflag = TRUE;

		if($result)

		{

		  $sess_array = array();

		  foreach($result as $row)

		  {

				$C_PASSWORD = $row->C_PASSWORD;

		  }

		}					


	$sql="SELECT c_username,n_ref_id,c_last_placed,c_position,c_email,	c_mobile,c_fname,c_lname
		FROM bc_master WHERE  pn_id='$id' ";
		

			$result = $this->admin_db->get_results($sql);			

			if($result)

			{

			  $sess_array = array();

			  foreach($result as $row)

			  {
					$c_username = $row->c_username;
					$sponser_id = $row->n_ref_id;
					$upline_id = $row->n_ref_id;	
					$c_last_placed = $row->c_last_placed;	
					$c_position = $row->c_position;	
					$c_email = $row->c_email;			
					$c_mobile = $row->c_mobile;		
					$c_fname = $row->c_fname;	
					$c_lname = $row->c_lname;	
			  }

			}

		

		//sponsername name geting

		if($sponser_id!=NULL)

		{

				$sql="SELECT c_username	FROM bc_master WHERE  pn_id='$sponser_id' ";
		

			$result = $this->admin_db->get_results($sql);			

			if($result)

			{

			  $sess_array = array();

			  foreach($result as $row)

			  {

					$sponser_username = $row->c_username;

			

			  }

			}

			else

			{		

			}

		}		

			


?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH ?>ajaxvalidation/css/style.css" />
<script type="text/javascript" src="<?php echo ASSET_PATH ?>ajaxvalidation/js/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="<?php echo ASSET_PATH ?>ajaxvalidation/js/distributor_profile_edit_validation_script.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH ?>css/style.css" />
<script type="text/javascript" src="<?php echo ASSET_PATH ?>js/jquery.validate.js"></script>
<div class="dashboard-wrapper">
<?php /*?><div class="container-fluid">
  <div class="top-bar clearfix">
    <div class="row gutter">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="page-title">
          <h3>Edit Username</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel">
        <div class="panel-body">
          <?php 
	
	
	echo $message1; ?>
          <form  role="form"  class="form-horizontal" name="form" id="form" method="post"  action="<?php echo base_url() ?>admin_editprofile_username">
            <INPUT type="hidden" name="userpnid" value="<?php echo $id ?>" />
            <INPUT type="hidden" name="pc_username" value="<?php echo $pc_username ?>" />
            <legend>New  User ID change</legend>
            <div class="form-gnroup col-md-6">
              <label class="control-label" for="input01"> User ID</label>
              <div class="row gutter">
                <input type="text" class="form-control  number" id="C_USERNAME" value="<?= isset($C_USERNAME) ? $C_USERNAME : set_value("C_USERNAME") ?>" name="C_USERNAME">
                <div class="error"><?php echo form_error('C_USERNAME'); ?></div>
              </div>
            </div>
            <!--<div class="form-gnroup col-md-6">
              <label class="control-label" for="input01">Shopping ID</label>
              <div class="row gutter">
                <input readonly type="text" class="form-control" value="<?php echo $c_shopping_id?>" >
              </div>
            </div>-->
            <div class="form-group no-margin">
              <div class="row gutter">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-warning">Update User ID</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="panel">
        <div class="panel-body">
          <form  role="form"  class="form-horizontal" name="form" id="form" method="post"  action="<?php echo base_url() ?>admin_editsponsor_username">
            <INPUT type="hidden" name="userpnid" value="<?php echo $id ?>" />
            <INPUT type="hidden" name="pc_username" value="<?php echo $pc_username ?>" />
            <legend>New Sponsor ID change</legend>
            <div class="form-gnroup col-md-12">
              <label class="control-label" for="input01">Sponsor ID</label>
              <div class="row gutter">
                <input type="text" class="form-control  number" id="sponser_username" value="<?= isset($sponser_username) ? $sponser_username : set_value("sponser_username") ?>" name="sponser_username">
                <div class="error"><?php echo form_error('sponser_username'); ?></div>
              </div>
            </div>
            <div class="form-group no-margin">
              <div class="row gutter">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-warning">Update Sponsor ID</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><?php */?>
<?php //if(isset($data['message1']))
echo $message; ?>
<div class="dashboard-wrapper">
<div class="container-fluid">
  <div class="top-bar clearfix">
    <div class="row gutter">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="page-title">
          <h3>Edit Profile</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel">
        <div class="panel-body">
          <form  role="form"  class="form-horizontal" name="form" id="form" method="post"  action="<?php echo base_url() ?>admin_editprofile">
            <INPUT type="hidden" name="userpnid" value="<?php echo $id ?>" />
            <INPUT type="hidden" name="pc_username" value="<?php echo $pc_username ?>" />
            <legend>Name and address</legend>
            <div class="form-group col-md-12">
              <label class="control-label" for="input01">First Name</label>
              <div class="row gutter">
                <input type="text" class="form-control  number" id="C_FNAME" value="<?= isset($c_fname) ? $c_fname : set_value("c_fname") ?>" name="C_FNAME">
                <div class="error"><?php echo form_error('C_FNAME'); ?></div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label" for="input01">Second Name</label>
              <div class="row gutter">
                <input type="text" class="form-control  number" id="C_LNAME" value="<?= isset($c_lname) ? $c_lname : set_value("c_lname") ?>" name="C_LNAME">
                <div class="error"><?php echo form_error('C_LNAME'); ?></div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label" for="name">Username</label>
              <div class="row gutter"><span class="form-control uneditable-input"><?php echo $c_username ?></span> </div>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label" for="input01">Password</label>
              <div class="row gutter">
                <input type="text" class="form-control  number" id="C_PASSWORD" value="<?= isset($C_PASSWORD) ? $C_PASSWORD : set_value("C_PASSWORD") ?>" name="C_PASSWORD">
                <div class="error"><?php echo form_error('C_PASSWORD'); ?></div>
              </div>
            </div>
            
            <div class="form-group col-md-12">
              <label class="control-label" for="input01">E-mail</label>
              <div class="row gutter">
                <input type="text" class="form-control email" id="C_EMAIL" value="<?= isset($c_email) ? $c_email : set_value("c_email") ?>" name="C_EMAIL">
                <div class="error"><?php echo form_error('C_EMAIL'); ?></div>
              </div>
            </div>
            
            <div class="form-group col-md-12">
              <label class="control-label" for="input01">Mobile</label>
              <div class="row gutter">
                <input type="text" class="form-control number" id="C_MOBILE"  value="<?= isset($c_mobile) ? $c_mobile : set_value("c_mobile") ?>" name="C_MOBILE">
                <div class="error"><?php echo form_error('C_MOBILE'); ?></div>
              </div>
            </div>
      
            <legend>Sponser Details</legend>
            <div class="form-group col-md-12">
              <label class="control-label" for="focusedInput">Sponser Username</label>
              <div class="row gutter"><span class="form-control uneditable-input"><?php echo $sponser_username ?></span> </div>
            </div>
            <!--<div class="form-group col-md-12">
              <label class="control-label" for="focusedInput">Placed under (Upline) Username</label>
              <div class="row gutter"><span class="form-control uneditable-input"><?php echo $upline_username ?></span> </div>
            </div>-->
            <?= $retc_side=isset($c_side) ? $c_side : set_value("c_side") ?>
            <div class="form-group col-md-12">
              <label class="control-label" for="optionsCheckbox">Side of placement</label>
              <div class="row gutter"> <span class="form-control uneditable-input"><?php echo $c_position ?></span> </div>
            </div>
            
            
            
            
            <div class="form-group no-margin">
              <div class="row gutter">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
              </div>
            </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/membersarea/js/jquery.form.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<!--<script src="<?php echo member_path ?>assets/membersarea/js/jquery.form.js"></script> 
<script src='<?php echo base_url();?>assets/membersarea/js/jquery.prettyPhoto.js'></script>
<link href="<?php echo base_url();?>assets/membersarea/css/prettyPhoto.css" rel="stylesheet" type="text/css" />-->
<script>
$(document).ready(function() 
{


$('#C_STATE').change(function(){
	
	var state=$('#C_STATE').val();
	$.ajax({
		
		type:"POST",
		data:{state:state},
		url:"<?php echo site_url();?>adminarea/search_user/get_district",
		dataType:'json',
		success:function(data)
		{
			
			
		var select = $("#C_DISTRICT"), options = '';
								   select.empty();
								   options += "<option value=''>Select District</option>";      
								   for(var i=0;i<data.length; i++)
								   {
									options += "<option value='"+data[i].n_dist_id+"'>"+ data[i].c_district +"</option>";              
								   }
								   select.append(options).trigger('change');
			
		}
		
	});
	
});



$('#C_DISTRICT').change(function(){
	
	var district=$('#C_DISTRICT').val();
	$.ajax({
		
		type:"POST",
		data:{district:district},
		url:"<?php echo site_url();?>adminarea/search_user/get_constituency",
		dataType:'json',
		success:function(data)
		{
			
			
		var select = $("#c_constituent"), options = '';
								   select.empty();
								   options += "<option value=''>Select Constituency</option>";      
								   for(var i=0;i<data.length; i++)
								   {
									options += "<option value='"+data[i].cid+"'>"+ data[i].constituencies +"</option>";              
								   }
								   select.append(options).trigger('change');
			
		}
		
	});
	
});









	
//$("a[rel^='prettyPhoto']").prettyPhoto();
$("#ssphone").keydown(function(e) {
    var oldvalue=$(this).val();
	
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+974') !== 0) {
            $(field).val('+974');
        } 
    }, 1);
});

 $('.pan_img').on('change', function() 
{
	
var id=this.id;	
	
var fd = new FormData();
        var files = $('#'+id)[0].files[0];
		
        fd.append('file',files);
		 fd.append('accountuser',<?php echo $id ?>);
$("#prvimg5").html('Please wait..its uploading...');
        
		
		$.ajax({
            url: '<?php echo site_url('ajax_image_pan') ?>',
            type: 'post',
		    data: fd,
			//dataType:'json',
            contentType: false,
            processData: false,
            success: function(data){
                   if(data != '')
				   {
					   if ($.trim(data[0].result) === 'success') {
						   $("#prvimg5").html('');
					   $('.pan_img').attr("src","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
					   $('#imglink2').attr("href","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
				  }else{
					  $("#prvimg5").html(data[0].resulttext);
					  }
				   }
                   else
				   {					   
                    
					 $("#prv"+id).html('<span style="color:#F00">Invalid Image</span>');
				   }
					
               
            }
			
        });

});

 	$('.bank_img').on('change', function() 
	{
		var id=this.id;	
		var fd = new FormData();
        var files = $('#'+id)[0].files[0];
		
        fd.append('file',files);
		fd.append('accountuser',<?php echo $id ?>);
		$("#prvimg6").html('Please wait..its uploading...');
        
		$.ajax({
            url: '<?php echo site_url('ajax_image_bank') ?>',
            type: 'post',
		    data: fd,
			//dataType:'json',
            contentType: false,
            processData: false,
            success: function(data){
                   if(data != '')
				   {
					   if ($.trim(data[0].result) === 'success') {
						   $("#prvimg6").html('');
					   $('.bank_img').attr("src","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
					   $('#imglink').attr("href","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
				  }else{
					  $("#prvimg6").html(data[0].resulttext);
					  }
				   }
                   else
				   {					   
                    
					 $("#prv"+id).html('<span style="color:#F00">Invalid Image</span>');
				   }
					
               
            }
			
        });

});
 	$('.aadhaar_img').on('change', function() 
	{
		var id=this.id;	
		var fd = new FormData();
        var files = $('#'+id)[0].files[0];
		
        fd.append('file',files);
		fd.append('accountuser',<?php echo $id ?>);
		$("#prvimg4").html('Please wait..its uploading...');
        
		$.ajax({
            url: '<?php echo site_url('ajax_image_aadhaar') ?>',
            type: 'post',
		    data: fd,
			//dataType:'json',
            contentType: false,
            processData: false,
            success: function(data){
                   if(data != '')
				   {
					   if ($.trim(data[0].result) === 'success') {
						   $("#prvimg4").html('');
					   $('.aadhaar_img').attr("src","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
					   $('#imglink').attr("href","<?php echo base_url();?>../upload_pic/"+data[0].resulttext);
				  }else{
					  $("#prvimg4").html(data[0].resulttext);
					  }
				   }
                   else
				   {					   
                    
					 $("#prv"+id).html('<span style="color:#F00">Invalid Image</span>');
				   }
					
               
            }
			
        });

});


});
 </script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
   <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<style>
 .capitalise{
	 text-transform: uppercase;
 }
 </style>
