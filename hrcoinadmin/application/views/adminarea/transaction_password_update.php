
<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Update Transaction Password</h3>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          
        </div>
      </div>
    </div>
    
    
 <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">

          <div class="panel-body">
            <div class="table-responsive">	  

            	        

            <form role="form" name="form" id="form" >    
                         
            <legend>User Details </legend>
            <div class="form-group col-md-6">
            <label class="control-label" for="focusedInput">Username</label>
            <input  type="text" id="username" name="username" class="form-control">
            <span id="sp_username">
            </div>
            <div class="form-group col-md-6">
            <label class="control-label" for="focusedInput">Transaction Password</label> 
                                                                
            <input  type="text" id="password" name="password" class="form-control">
                        </div>                                                    
            <div class="form-actions">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Cancel</button>
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


<script src="<?php echo ASSET_PATH ?>js/jquery.validate.js"></script>
<script src="<?php echo ASSET_PATH ?>js/swal.js"></script>
<script type="text/javascript">

  
      $("#form").validate({ 

        rules: {  
            username:{  required: true,

                remote:
                        {
                          url: "<?php echo site_url('check_user') ?>",
                          type: "post"
                         },                  
                         },              
                        
            password:'required'
             },
          messages: {                
             username:"&nbsp;Please enter Username",
             remote: "&nbsp;Entered username is not registered ",
             password:"&nbsp;Please enter Password"
            } ,
      
        submitHandler: function ()
              {
                $('#submit').attr('disabled', 'true');
              
                $.ajax({
                type: "POST",
                url: "<?php echo site_url('reform_transaction_password') ?>",
                data: new FormData($('#form')[0]),       
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (msd)
                        {
    
                            if (msd == "success") {
                        
                swal('Successfully Updated','',"success")
               window.location.reload();
              }
              
              else  {
                
                  Swal('Some Error Occured!Try after Sometime','',"warning")
                
                             
                
              }

          
                        }
            
            })

        }
          }); 


      $('#username').keyup(function(){

            var sponsor_username=$(this).val();

                 

                 

                  $.ajax({



            type: "POST",



            url: '<?php echo base_url();?>get_sp_username',



            data:{sponsor_username:sponsor_username},

                success: function (result)



                    {

                         $("#sp_username").html('Name: '+result);

                    }

                      

                  });
                })



 
       
        
        

</script>

