<?Php
	$fname=$this->session->userdata('name');
	$id=$this->session->userdata('id');
	//$randomnumber = random_string('alnum', 16);			
	//$this->session->set_userdata('sesran', $randomnumber);	

?>		
 <div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Reset common password</h3>
          </div>
        </div>
        
      </div>
    </div>
    
    
 <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">

          <div class="panel-body">
            <div class="table-responsive">	             	        

            <form role="form" method="post" id="addform" action="<?php echo base_url();?>save_common_password">
                                                  
                                                     <div class="form-group col-md-7">
                                                      <label class="control-label" for="focusedInput">Password</label>
                                                         <input type="text" class="form-control" id="c_pwd" value="" name="c_pwd">
                                                     </div>
                                                        
                                              <div class="form-group col-md-12">
                                                      
                                                          <button id="formsubmit" style="margin-top:30px !important;" type="submit" class="btn btn-primary">Submit</button><div id="progressbox"><div id="progressbargallery"></div ></div>    
                                                       </div>          
            
                                      </fieldset>
                              </form>
            </div>
          </div>
        </div>
      </div>
    </div>   
  </div>
</div>
<script src="<?php echo ASSET_PATH ?>js/jquery.form.js"></script>
<script src="<?php echo ASSET_PATH ?>js/jquery.validate.js"></script>
<script src="<?php echo ASSET_PATH ?>js/swal.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
			$("#addform").validate({ rules: {	
						c_pwd:'required',
						 },
					messages: {								 
						 c_pwd:"&nbsp;Please enter Password",
						} 
				}); 
				$('#formsubmit').unbind('click').bind('click', function () {
				var progressbox 	= $('#progressbox');
				var progressbar 	= $('#progressbargallery');
				var statustxt 		= $('#statustxt');
				var output 			= $("#output");
				var completed 		= '0%';
					
			    $("#addform").ajaxForm({
					beforeSend: function() { //brfore sending form
					progressbox.show(); //show progressbar
						progressbar.width(completed); //initial value 0% of progressbar
						statustxt.html(completed); //set status text
						statustxt.css('color','#000'); //initial color of status text
					},
					uploadProgress: function(event, position, total, percentComplete) { //on progress
						progressbar.width(percentComplete + '%') //update progressbar percent complete
						statustxt.html(percentComplete + '%'); //update status text
						if(percentComplete>50)
							{
								statustxt.css('color','#fff'); //change status text to white after 50%
							}
						},
					complete: function(response) { // on complete				
						 progressbox.hide(); // hide progressbar
						  				if(response.responseText == 'success'){
										 $("#addform")[0].reset();
										 
										   swal({title: "Success!", type: "success", text: "Common password reset successfully", showConfirmButton: false, timer: 2000});
										 }
										 else if(response.responseText == 'error'){
										    swal({title: "Error!", type: "error", text: "Please try after some time", showConfirmButton: false, timer: 2000});
										 }
										  else {
										   // handleMessengeralert('error',response.responseText)
										 }
					}
				});
            });
});
</script>
<style>

#progressbox {
    border: 1px solid #0099CC;
    border-radius: 3px;
    display: none;
    margin: -30px 117px 8px;
    padding: 1px;
    text-align: left;
    width: 400px;
}
#progressbargallery {
    background-color: #003333;
    border-radius: 3px;
    height: 20px;
    width: 1%;
}
#statustxt {
    color: #000000;
    display: inline-block;
    left: 35%;
    position: absolute;
    top: 8px;
}
</style>
