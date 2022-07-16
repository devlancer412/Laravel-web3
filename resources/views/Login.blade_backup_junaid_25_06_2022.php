
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
                            <img src="master/images/hrc.png" alt="">
                        </div>
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <form id="loginForm" name="loginForm" method="post"  autocomplete="off">
                                <!-- <h2 class="text-center site-t text-uppercase my-5 w-f">Sign In</h2> -->
                                {{csrf_field()}}
                                  <span id="err_msg"></span>
                                    @if( Session::get('fail'))
                                        <div class='alert alert-danger'>
                                            {{Session::get('fail')}}
                                        </div>  
                                    @endif
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
                                    <div class="p-2 bd-highlight"><br>
                                           <button type="submit" class="btn btn-primary" style="text-align: center;background-color: #d5aa57;width: 150px;height: 50px;margin: auto;color: #000;border-radius: 5px;padding: 14px 0px;text-decoration: none;margin-bottom: 20px;margin-left:170;" href="#">Login</button>
                                    </div>        
                                    
                                <div style=" display: flex;
                                    width: 100%;
                                    justify-content: center;gap: 40px;margin-bottom: 20px;" class="jun button-3">
                                    <a style="color: #fff;text-decoration: none;" href="#">Forget Password ?</a>
                                    <a style="color: #fff;text-decoration: none;" href="#">Forget User ID ?</a>
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
.box{

    background: #194f47;}
    label.error {
    position: relative;
    top: -15px;
    font-size: 14px;
}
</style>
