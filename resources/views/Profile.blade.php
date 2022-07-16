@include('_header')
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="users/js/additional-methods.min.js" ></script>
						<div class="page-header">
							<div class="page-leftheader">
								
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="index.html">Profile</a></li>
								</ol>
							</div>
					
						</div>											<!--Page header-->
						
                        <!--End Page header-->
												<!-- Row -->
					<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-12">
								<div class="card box-widget widget-user">
									<div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" class="rounded-circle" src="assets/images/users/2.jpg"></div>
									<div class="card-body text-center">
										<div class="pro-user">
											<h4 class="pro-user-username text-dark mb-1 font-weight-bold"><span id="namee1"></span></h4>
											<h6 class="pro-user-desc text-muted">HRC</h6>
											
											<a href="editprofile" class="btn btn-primary  mt-3"><i class="fa fa-pencil"></i> Edit Profile</a>
											
										</div>
									</div>
								
								</div>
								
							</div>
							<div class="col-xl-9 col-lg-9 col-md-12">
								
									
										
										
									<div class="card">
									<div class="card-body">
										<h4 class="card-title">Personal Details</h4>
										<div class="table-responsive">
											<table class="table mb-0">
												<tbody>
													<tr>
														<td class="py-2 px-0">
															<span class="font-weight-semibold w-50">Email </span>
															
														</td>
														<td class="py-2 px-0"><input type="text" style="border:none;" value="" name="email" id="email"></td>
													</tr>
													<tr>
														<td class="py-2 px-0">
															<span class="font-weight-semibold w-50">Username</span>
														</td>
														<td class="py-2 px-0"><input type="text" style="border:none;" value="" name="username" id="user_name"></td>
													</tr>
													<tr>
													<td class="py-2 px-0">
															<span class="font-weight-semibold w-50">First Name</span>
														</td>
														<td class="py-2 px-0"><input type="text" style="border:none;" value="" name="first_name" id="first_name"></td>
													</tr>
													
													<tr>
														<td class="py-2 px-0">
															<span class="font-weight-semibold w-50">Last Name</span>
														</td>
														<td class="py-2 px-0"><input type="text" style="border:none;" value="" name="last_name" id="last_name"></td>
													</tr>
													<tr>
														<td class="py-2 px-0">
															<span class="font-weight-semibold w-50">Mobile No </span>
														</td>
														<td class="py-2 px-0"><input type="text" style="border:none;" value="" name="phone" id="phone"></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
										
									
							
							</div>
						</div>




					</div>
				</div><!-- end app-content-->
			</div>
		@include('_footer')
<script>
        $.ajax(
        {
            url:"{{url('profileview')}}",
            type: "GET",
            dataType : 'json',
            success: function(result)
            {      
            
                $('#email').val(result.c_email);
                $('#user_name').val(result.c_username);
			
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
                   console.log(result[0].c_fname);
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
               
                
                $('#namee1').text(firstname +" "+secondname ); 
           
    
            }
        });
      });    
</script>   