
<style>
    .error
    {
        color:red;
    }
</style>

<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<!-- <script src="users/js/additional-methods.min.js" ></script> -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<!----------------login-page---------------------->
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/user/css/stylee.css">
    <title>Login</title>
    <div class="container-fluid bg">
        <div class="container">
            <div class="d-flex flex-row bd-highlight mb-3 justify-content-center">
                <div class="p-2 bd-highlight">
                    <div class="row sign">
                        <div class="col-md-12">
                            <a href="https://keralaeshoppe.com/"><img src="master/images/hrc.png" alt=""></a>
                        </div>
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <form id="loginForm" name="loginForm" method="post"  autocomplete="off">
                                <!-- <h2 class="text-center site-t text-uppercase my-5 w-f">Sign In</h2> -->
                           
                                    <!-- <span id="err_msg"></span> -->
                                <div class="p-2 bd-highlight">
                                    <div class="box">
                                     <span class="text-danger" id="c_usernameErrorMsg"></span>
                                        <input id="c_username" type="text" name="c_username" placeholder="Username" />
                                    </div>
                                </div>
                                <span class="text-danger" id="c_passwordErrorMsg"></span>
                                <div class="p-2 bd-highlight">
                                    <div class="box">
                                        <input id="c_password" type="password" name="c_password" placeholder="Password" />
                                    </div>
                                </div>
                                    <div class="p-2 bd-highlight bv">
                                           <button type="submit" class="btn"  href="#">Login</button>
                                    </div>   
                                    <br>
                                     {{csrf_field()}}
                                  <span id="err_msg"></span>
                                    @if( Session::get('fail'))
                                        <div class='alert alert-danger'>
                                            {{Session::get('fail')}}
                                        </div>  
                                    @endif
                                <div style=" display: flex;
                                    width: 100%;
                                    justify-content: center;gap: 40px;margin-bottom: 20px;" class="jun button-3">
                                    <a style="color: #fff;text-decoration: none;" href="forget">Forgot Password ?</a>
                                    <a style="color: #fff;text-decoration: none;" href="forget">Forgot User ID ?</a>
                                </div>
                                    
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- --------------------------------script for validation and form submitting----------------------- -->
<script>
    $(document).ready(function()
    {
        var $SubmitForm = $('#loginForm');
        // jQuery.validator.addMethod("lettersonly", function(value, element)
        //   {
        //     return this.optional(element) || /^[A-Za-z][a-z0-9\-\s]+$/i.test(value);
        //     }, "Letters and Numbers only please"); 
        $SubmitForm.validate(
        {
         
            rules:
            {   
                c_username: 
                {
                    required: true,
                    maxlength:8,
                    minlength:4,
                   
                    remote:{
                        url :"usernamecheck"
                    }
                   
                }, 
                c_password: 
                {
                    required: true,
                    minlength:3,
                    maxlength:15, 
                },            
            },
            messages:
            {                   
                c_username: 
                {
                    required: "Username is required  !",
                    maxlength:'Username must be atmost 8 character!',
                    minlength:'Username must be at least 4 character!',
                    remote: "Username is not registered"
                    
                },
                c_password: 
                {
                    required: 'Please enter password!',
                    minlength:'Password must be at least 3 character!',
                    maxlength:'Password must be atmost 15 character!'
                },        
            },
            submitHandler: function ()
            {
                // $('#login_submit').attr('disabled', 'true');        
                var c_username = $('#c_username').val();
                var c_password = $('#c_password').val();
                $("#err_msg").html("Loading..");
                $.ajax(
                {
                    url: "/usercheck",
                    type:"POST",
                    data:
                    {
                        "_token": "{{ csrf_token() }}",
                        c_username :c_username ,
                        c_password:c_password,                
                    },
                    success:function(response)
                    {
                        if(response.status=='success')
                        {
                            $("#err_msg").html("<font color=green>"+response.message+"</font>");
                            window.location.href="dashboard";
                        }
                        else
                        {
                            $("#err_msg").html("<font color=red>"+response.message+"</font>");
                        }            
                    },
                    error: function(response) 
                    {
                        $('#c_usernameErrorMsg').text(response.responseJSON.errors.c_username);
                        $('#c_passwordErrorMsg').text(response.responseJSON.errors.c_password);        
                    },
                });         
            }
        });
    }); 
</script>
<style>

input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active{
    -webkit-box-shadow: 0 0 0 30px #194f47 inset !important;
}
input:-webkit-autofill{
    -webkit-text-fill-color: white !important;
}
span#err_msg {
    position: absolute;
    /* top: 0; */
    width: 100%;
    text-align: center;
    right: 0;
    left: 0;
    margin-top: -29px;
}
.box{

    background: #194f47;}
    label.error {
    position: relative;
    top: -15px;
    font-size: 14px;
}
.p-2.bd-highlight.bv {
    text-align: center;
}
.p-2.bd-highlight.bv button {
    background-color: #d5aa57;
    border: none;
    padding: 12px 46px;
    color: black;
    border-radius: 37px;
    outline:0;
}
.alert-danger {
    color: #ff253a;
    background-color: #f8d7da00;
    border-color: #f5c6cb00;
    text-align: center;
    position: relative;
    top: -31px;
    margin: 0;
}
@media  (max-width: 340px) {
    .sign{width: 100% !important;}
    .box{width: 100% !important;margin: 0;}
    .check input {margin-left: 0;}
    .check label{font-size: 14px;margin-bottom: 0;}
    .button-2 a{font-size: 12px;}
    .button-3 a{font-size: 12px;}
}
@media  (max-width: 399px) {
    .sign{width: 350px !important;}
    .box{width: 300px;margin: 0;}
    .check input {margin-left: 0;}
    .check label{font-size: 14px;margin-bottom: 0;}
    .button-2 a{font-size: 12px;}
    .button-3 a{font-size: 12px;}
}
@media  (max-width: 499px) {
    .sign{width: 370px;}
    .box{width: 330px;margin: 0;}
    .check input {margin-left: 0;}
    .check label{font-size: 14px;margin-bottom: 0;}
    .button-2 a{font-size: 12px;}
    .button-3 a{font-size: 12px;}
}
</style>
