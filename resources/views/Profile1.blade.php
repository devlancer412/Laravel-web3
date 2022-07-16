@include('common.header')
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="users/js/additional-methods.min.js" ></script>

<section class="currency-page pad-4">
    <div class="container">
      <div class="row row-eq-height">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="white-shadow">
          <h2 class="heading1">Personal Information</h2>
          <div class="user-profile-input">
            <!-- <h6>Presonal Information</h6> -->
            <span id="err_msg"></span>
            <form id="profileForm" action=""  autocomplete="off">
              {{csrf_field()}}
              <span class="text-danger" id="emailErrorMsg"></span>
              <div class="row">
                <div class="form-group col-md-6 col-lg-4">
                  <label>Email</label>
                  <input type="text" class="form-control" value="" name="email" id="email" >
                </div>
                <div class="form-group col-md-6 col-lg-4">
                  <label>Username</label>
                  <input type="text" class="form-control" value="" name="username" id="username"disabled>
                </div>
                <span class="text-danger" id="firstnameErrorMsg"></span>
                <div class="form-group col-md-6 col-lg-4">
                  <label>First Name</label>
                  <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" value="">
                </div>
                <span class="text-danger" id="lastnameErrorMsg"></span>
                <div class="form-group col-md-6 col-lg-4">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="">
                </div>
                <span class="text-danger" id="phoneErrorMsg"></span>
                <div class="form-group col-md-6 col-lg-4">
                  <label>Phone number</label>
                  <input type="text" class="form-control" placeholder="Phone number" name="phone"  id="phone" value="">
                </div>
                <div class="col-md-12">
                  <div class="api-button">
                    <button class="btn button1 mt-0" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    $(document).ready(function()
    {
  
        var $profileForm = $('#profileForm');
        jQuery.validator.addMethod("lettersonly", function(value, element)
           {
            return this.optional(element) || /^[A-Za-z][a-z0-9\-\s]+$/i.test(value);
            }, "Letters and Numbers only please"); 
        $profileForm.validate(
        {
            rules:{
                email: 
               {
              required: true,
              // validEmail: true
              },
            first_name:{
                required:true,
                lettersonly:true,
                maxlength : 15
            },
            phone:{
                required:true,
                number:true,
                maxlength : 10,
                minlength : 10
            },
            last_name:{
                required:true,
                lettersonly:true
            }
            
            },
            messages:{
                email: 
            {
              required: "Enter email",
            },
            first_name:{
                required:"Enter first name",
                maxlength : "Please enter atleast 15 digits"
            },
            phone:{
                required:"Enter phone number",
                number:"Enter valid phone number",
                maxlength:"Please enter atmost 10 digits",
                minlength:"Please enter atleast 10 digits"
            },
            last_name:{
                required:"Enter last name",
            } 
            },
        
        submitHandler: function ()
            {
                $('#reg_submit').attr('disabled', 'true');
                        
                var formData = new FormData($('#profileForm')[0]); 
                $('#err_msgs').html("");
              
                $.ajax
                ({
                    url: "/profileupdate",
                    type:"post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,

                   success:function(response)
                    {
                      if(response.status=='success')
                        {
                          $("#err_msg").html("<font color=red>"+response.message+"</font>");
                          window.location.href="dashboard";
                        }
                        else
                        {
                          $("#err_msg").html("<font color=red>"+response.message+"</font>");
                        }                
                    },
                    error: function(response) 
                    {
                        $('#emailErrorMsg').text(response.responseJSON.errors.email);
                        $('#firstnameErrorMsg').text(response.responseJSON.errors.firstname);   
                        $('#lastnameErrorMsg').text(response.responseJSON.errors.lastname);  
                        $('#phoneErrorMsg').text(response.responseJSON.errors.phone);  
                             
                    },
                    
                });
            }
        });
    });
    </script>

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
@include('common.footer')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />