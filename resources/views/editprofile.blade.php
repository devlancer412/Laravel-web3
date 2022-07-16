@include('_header')
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="user/js/additional-methods.min.js" ></script>
						<div class="page-header">
							<div class="page-leftheader">
								
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboardview"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="editprofile">Edit Profile</a></li>
								</ol>
							</div>
					
						</div>	
						<div id="echart1"></div><!--Page header-->
						
                    						<!-- Row -->
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="card box-widget widget-user">
									<div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="assets/images/widget_icon/atr.png" ></div>
									<div class="card-body text-center pt-2">
										<div class="pro-user">
											<h3 class="pro-user-username text-dark mb-1 fs-22"><span id="usernameee"></span></h3>
											<h6 class="pro-user-desc text-muted">HRC Coin</h6>
										
										</div>
									</div>
								
								</div>
								<!--<div class="card">-->
								<!--	<div class="card-header">-->
								<!--		<div class="card-title">Edit Password</div>-->
								<!--	</div>-->
								<!--	<div class="card-body">-->
										
								<!--		<div class="form-group">-->
								<!--			<label class="form-label">Change Password</label>-->
								<!--			<input type="password" class="form-control" value="password">-->
								<!--		</div>-->
								<!--		<div class="form-group">-->
								<!--			<label class="form-label">New Password</label>-->
								<!--			<input type="password" class="form-control" value="password">-->
								<!--		</div>-->
								<!--		<div class="form-group">-->
								<!--			<label class="form-label">Confirm Password</label>-->
								<!--			<input type="password" class="form-control" value="password">-->
								<!--		</div>-->
								<!--	</div>-->
								<!--	<div class="card-footer text-right">-->
								<!--		<a href="#" class="btn btn-primary">Updated</a>-->
								<!--		<a href="#" class="btn btn-danger">Cancle</a>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						<form id="edit_form" method="post">
						    @csrf
						     @if(Session::get('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>                
                            @endif              
                            @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                            @endif	
							<div class="col-xl-9 col-lg-8">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Profile</div>
									</div>
									<div class="card-body">
										<div class="card-title font-weight-bold">Basci info:</div>
										<div class="row">
											<div class="col-sm-6 col-md-6">
											
												<div class="form-group">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" style="color: black;" placeholder="First Name" id="first_name" name="first_name">
													      <span class="text-danger" id="first_nameErrorMsg"></span>
												</div>
											</div>
			                          
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" style="color: black;" placeholder="Last Name" id="last_name" name="last_name">
													         <span class="text-danger" id="last_nameErrorMsg"></span>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" style="color: black;"  placeholder="Email" id="email" readonly >
												</div>
											</div>
										   
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Phone Number</label>
													<input type="text" class="form-control" style="color: black;" placeholder="Number" id="phone" name="phone">
													<span class="text-danger" id="phoneErrorMsg"></span>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Address</label>
													<input type="text" class="form-control" style="color: black;" placeholder="Home Address" id="address" name="address">
													<span class="text-danger" id="addressErrorMsg"></span>

												</div>
											</div>
										
											
										</div>
										
										
										
									</div>
									<div class="card-footer text-right">
										<button type="button" class="btn  btn-primary">Update</button>
										<button type="cancel" class="btn btn-danger">Cancle</button>
									</div>
								</div>
							</div>
						
						</div>
					</form>	

					</div>
				</div><!-- end app-content-->
			</div>
<style>
				a.btn.btn-primary.mt-3 {
    width: 100%;
}
input[type="file"] {
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
    text-align: center;
    z-index: -2;
}
input[type="file"] {
    z-index: 10000;
    /* visibility: collapse; */
}
</style>
<script>
        $.ajax(
        {
            
            url:"{{url('profileview')}}",
            type: "GET",
            dataType : 'json',
            success: function(result)
            {   
            
                $('#email').val(result.c_email);
                $('#username').val(result.c_username);
                $('#first_name').val(result.c_fname);
                $('#last_name').val(result.c_lname);
                $('#phone').val(result.c_mobile);
                
            }
        });
        
</script>


<script>

      $( window ).on('load', function() 
      {
        $.ajax(
        {
            url:"{{url('get_user_datas')}}",
            type: "GET",
            dataType : 'json',
            success: function(result)
            {  
                // console.log(result[0].c_fname);
                var fname= result[0].c_fname;
                var lname=result[0].c_lname;
                if(fname==null && lname ==null)
                {
                 var firstname="No";
                 var secondname="Name";

                }
                else
                {
                    var firstname=result[0].c_fname;
                    var secondname=result[0].c_lname;
                }                
               
                $('#usernameee').text(firstname +" "+secondname ); 

    
            }
        });
      });    
</script> 

    <!-------------------- Upload Customer Details to Database using Json---------------- -->
<script>
    $(document).ready(function()
    {
      var $formData = $('#edit_form');
                           
           $('#edit_form').validate(
        {
          rules:
            {    
                first_name:{required: true},  
                last_name:{required: true},
                address: {required: true},
                phone:{noSpace:true,digits:true,minlength:10,maxlength:10},
            },
            messages:
            {
                first_name:
                {
                    required : 'Please enter First Name' 
                },
                 last_name:
                {
                    required : 'Please enter Last Name' 
                },
                address:
                {
                    required : 'Please enter Your Address'
                },
               
                phone:
                {
                    digits:'Please enter a numeric value!',
                    minlength:'Mobile No must be at least 10 character!',
                    maxlength:'Mobile No must be atmost 10 character!',
                    required : 'Please enter Mobile Number:'
                },
               
            },
            
            submitHandler: function ()
            {

                $('#reg_submit').attr('disabled', 'true');
                        
                var formData = new FormData($('#edit_form')[0]); 
                
                alert(formData);
                $('#err_msgs').html("");
              
                $.ajax
                ({
                    url: "/profileupdate",
                    type:"post",
                    data: formData,
                    // processData: false,
                    // contentType: false,
                    // cache: false,
                    // timeout: 600000,

                   success:function(response)
                    {
                    console.log(response);

                      if(response.status=='success')
                        {
                          $("#err_msg").html("<font color=red>"+response.message+"</font>");
                    
                          window.location.href="editprofile";
                          
                        }
                        else
                        {
                          $("#err_msg").html("<font color=red>"+response.message+"</font>");
                        }                
                    },
                  error: function(response) 
                    {
                        $('#first_nameErrorMsg').text(response.responseJSON.errors.first_name);
                        $('#last_nameErrorMsg').text(response.responseJSON.errors.last_name);        
                        $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
                        $('#addressErrorMsg').text(response.responseJSON.errors.address);                         
                    },
                    
                });
            }
        });
    });
      
</script>

 @include('_footer')