<style>
  .error
  {
    color:red;
  }
</style>
<!--signup-page-->
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="user/js/additional-methods.min.js" ></script>

   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/user/css/styles.css" />
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>-->
    <title>Signup</title>
  <div class="container-fluid bg">
        <div class="containerc">
            <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                <div class="p-2 bd-highlight">
                    <div class="row sign">
                        <div class="col-md-12">
                            <img src="master/images/hrc.png" alt="">
                        </div>
                            <div  style="    flex: 1;" class="d-flex flex-column bd-highlight mb-3">
                              <span id="err_msg"></span>
                                <form id="registerForm" name="registerForm"  autocomplete="off">
                                    <!--<h2 class="text-center">Sign Up</h2>-->
                                    @csrf
                                      <span class="text-danger" id="usernameErrorMsg"></span>
                                        <div class="p-2 bd-highlight">
                                            <div class="box">
                                                <input  type="text" name="username" id="username" placeholder="Username" />
                                            </div>
                                        </div>
                                      <span class="text-danger" id="passwordErrorMsg"></span>
                                        <div class="p-2 bd-highlight">
                                            <div class="box">
                                                <input  type="password" name="password" id="password" placeholder="Password" />
                                            </div>
                                        </div>
                                        <span class="text-danger" id="confirm_passwordErrorMsg"></span>
                                        <div class="p-2 bd-highlight">
                                            <div class="box">
                                                <input  type="password" id="confirm_password" name="confirm_password" placeholder="Retype Password" />
                                            </div>
                                        </div>
                                        <span class="text-danger" id="emailErrorMsg"></span>
                                        <div class="p-2 bd-highlight">
                                            <div class="box">
                                                <input  type="email"  placeholder="Email" name="email" id="email" />
                                            </div>
                                        </div>
                                          <input type="hidden" name="referral" value="{{$referral}}">
                                         <div class="p-2 bd-highlight bc">
                                            <div class="box-1 check">
                                                <label><input type="checkbox" value="" id="accept" name="accept" >I Agree with the<a class="site-t" href="terms">Terms & Conditions</a></label>
                                                <div class="df"><label for="accept" class="error"></label></div>
                                            </div>
                                        </div>
                                         <span class="text-danger" id="acceptErrorMsg"></span>
                                        <div class="c">
                                          <button type="submit" class="btn btn-primary" style="text-align: center;background-color: #d5aa57;">Register Now</button>
                                        </div>
                                        <!--<a style="text-align: center;background-color: #d5aa57;width: 150px;height: 50px;margin: auto;color: #000;border-radius: 5px;padding: 14px 0px;text-decoration: none;margin-bottom: 20px;" href="#">Register Now</a>-->
                                        <div class="jun">
                                            <a style="color:  #fff;text-decoration: none;" href="#">You have an account</a>
                                            <a style="color:  #d5aa57;text-decoration: none;padding-left: 10px;" href="{{url('login')}}">Login Now</a>
                                        </div>
                                </form>
                             </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<!--------------------Script for minimum age,Jquery Validation and submitHandler--------------->
<script>
 //   $(document).ready(function()
   // {
  
        var $registerForm = $('#registerForm');
        jQuery.validator.addMethod("lettersonly", function(value, element)
           {
            return this.optional(element) || /[A-Za-z][a-z0-9\-\s]+$/i.test(value);
            }, "Letters and Numbers only please"); 
            
        $registerForm.validate(
        {
          rules: 
          {
            email: 
            {
              required: true,
              // validEmail: true
            },
            username:
            {
              required: true,
              alphanumeric: true,
              minlength: 3,
              lettersonly:true,
              maxlength: 10
            },
           password: 
            {
              required: true,
              minlength: 8,
              maxlength: 15
            //   upper: true,
            //  specialchars: true,
            //  onenumeric: true,
            //  lower: true,
            //  noSpace: true
            },
            confirm_password: 
            {
              required: true,
              equalTo: "#password"
            },
            accept: 
            {
              required: true
            }
          },
          messages:
          {
            email: 
            {
              required: "Enter email",
            },
            username: 
            {
              required: "Enter username !",
              minlength: "Enter minimum 3 characters",
              maxlength: "Maximum length is 10 characters"
            },
            password:
            {
              required: "Enter password",
              minlength: "Enter minimum 8 characters",
             maxlength: "Maximum length is 15 characters"
            },
            confirm_password: 
            {
              required: "Enter confirm password",
              equalTo: "Enter the same password"
            },
            accept: 
            {
              required: "Please accept our terms"
            }
          },
      
         
          submitHandler: function ()
            {
             $('#reg_submit').attr('disabled', 'true');
              var formData =  new FormData($('#registerForm')[0]);
                $('#err_msgs').html("");
                
              $.ajax({
                
                type: "POST",
                dataType : 'json',
                url: "register",
                data:$('#registerForm').serialize(),
                success:function(response)
                {
                    
                    
                    // alert(response.status);
                    console.log(response);
                    
                  if(response.status=='success')
                        {
                        $("#err_msg").html("<font color=blue>"+response.message+"</font>");
                        window.location.href="certificate";             
                        }
                        else
                        {
                        $("#err_msg").html("<font color=red>"+response.message+"</font>");
                        }    
                         
                },
                
                error: function(response) 
                    {
                        var err = response.responseJSON.errors;
                        $.each(err, function(index, value) {
                            if(index=='username')
                            {
                                $('#usernameErrorMsg').text(value);
                            }
                            else if(index=='email')
                            {
                               $('#emailErrorMsg').text(value);  
                            }
                             else if(index=='password')
                            {
                               $('#passwordErrorMsg').text(value);   
                            }
                             else if(index=='confirm_password')
                            {
                               $('#confirm_passwordErrorMsg').text(value);  
                            }
                             else if(index=='acceptpassword')
                            {
                               $('#acceptErrorMsg').text(value);       
                            }
                            
                        });
                        // $('#usernameErrorMsg').text(response.responseJSON.errors.username[0]);
                        // $('#emailErrorMsg').text(response.responseJSON.errors.email[0]);  
                        // $('#passwordErrorMsg').text(response.responseJSON.errors.password[0]);   
                        // $('#confirm_passwordErrorMsg').text(response.responseJSON.errors.confirm_password[0]);  
                        // $('#acceptErrorMsg').text(response.responseJSON.errors.acceptpassword[0]);       
                    },
              })
            }
        });
   // });     
</script>

<style>
.df {
    /* text-align: center; */
    position: relative;
    top: -6px;
    padding: 0px 72px;
}
a.site-t {
    color: #f9a63f;
    text-decoration: none;
}
label.error {
    position: relative;
    top: -14px;
    left: 0px;
    font-size: 14px;
}
    .box {
    width: 430px;
    height: 60px;
    margin: 0px 25px;
    background-image: beige;
    border-radius: 10px;
    padding: 0px 25px;
    box-shadow: 0 40px 30px -8pxrgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
    background: #194f47;
}
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active{
    -webkit-box-shadow: 0 0 0 30px #194f47 inset !important;
}
input:-webkit-autofill{
    -webkit-text-fill-color: white !important;
}



.c button {
    border: none;
    padding: 9px 25px;
    color: black;
    border-radius: 50px;
    font-size: 14px;
    margin-top: 6px;
}



@media (max-width: 867px){
    .jun a {
    font-size: 13px;
}
    input {
    background-color: inherit;
    border: none;
    padding: 16px 0px;
    border-bottom: solid 2px #d1cccc;
    margin-bottom: 26px;
    color: #fff;
    width: 100%;
    font-weight: 500;
    font-size: 12px;
}
    .check label {
    font-size: 12px;
    margin-bottom: 0;
}
    .bg {
    background: url(/master/images/signup-bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
   }
    
    
.box {
    width: 100%;
    height: 60px;
    margin: 0px 0px;
    background-image: beige;
    border-radius: 10px;
    padding: 0px 8px;
    box-shadow: 0 40px 30px -8pxrgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
    background: #194f47;
}

}
.c button {
    border: none;
    padding: 9px 25px;
    color: black;
}
.c {
    text-align: center;
    margin-bottom: 13px;
}
</style>
