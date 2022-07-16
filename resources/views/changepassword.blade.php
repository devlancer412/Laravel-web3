	
@include('_header')
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<style>
    .error{
        color:red;
        font-size: 15px;
    }
    input.error{
        border:2px solid red;
    } 
   
    .container-scroller
    {
      width:1600px;
    }
</style>
<div class="page-header">
	<div class="page-leftheader">
		<h2>Change Password</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="index.html">Change Password</a></li>
		</ol>
	</div>
</div>	
<div class="card">
    <div class="card-header">
	    <div class="card-title">Change Password</div>
    </div>                        
    <form  id="changePassword" method="post">
         <span id="err_msg"></span>
            @if (Session::get('error'))
                <h5 style="text-align:center;color:red;">
                    {{Session::get('error')}}
                </h5>
            @endif 
        <div class="card-body">
	        <div class="form-group">
        		<label class="form-label">Old Password</label>
        		<input type="password" class="form-control" name="oldpassword" id="oldpassword" value="">
        		 <span class="text-danger" id="oldpasswordErrorMsg"></span>
	        </div>
        	<div class="form-group">
        		<label class="form-label">New Password</label>
        		<input type="password" class="form-control"  name="newpassword" id="newpassword" value="">
        		 <span class="text-danger" id="newpasswordErrorMsg"></span>
        	</div>
        	<div class="form-group">
        		<label class="form-label">Confirm Password</label>
        		<input type="password" class="form-control"   name="newcpassword" id="newcpassword" value="">
        		 <span class="text-danger" id="newcpasswordErrorMsg"></span>
        	</div>
        </div>
        <div class="card-footer text-right">
        	 <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button"class="btn btn-primary"> Cancel</button>
        </div>

    </form>
</div>
</div>
</div>

<!-----------------------Script For Jquery Validation And Submithandler----------------------->
<script>

    $(document).ready(function(){
        var $ChangePassword = $('#changePassword');
        $ChangePassword.validate({
            rules:{               
                oldpassword: 
                {
                    required: true,
                    remote:
                    {
                        url:"/oldpasswordchecks"
                    }
                },
                newpassword: 
                {
                    required: true,
                    minlength:3
                },          
                newcpassword: 
                {
                    required: true,
                    minlength:3,
                    equalTo: '#newpassword'
                }, 
            },
            messages:{

                oldpassword: 
                {
                    required:  'Please enter Old Password!',
                    minlength: 'Password must be at least 3 character!',
                    remote:    "Please check the old password is correct.",
                },
                newpassword:
                {
                    required: 'Please enter New Password ',
                    minlength:'New Password must be at least 3 character!'
                },
                newcpassword:
                {
                    required: 'Please enter your Confirm Password ',
                    equalTo: 'Please enter Same Password!',
                    minlength:'Confirm Password must be at least 3 character!'
                }
            },
            submitHandler: function ()
            {
                $('#reg_submit').attr('disabled', 'true');                        
                var oldpassword = $('#oldpassword').val();
                var newpassword = $('#newpassword').val();
                var newcpassword = $('#newcpassword').val();
                $.ajax
                ({
                    url: "changepasswords",
                    type:"post",
                    data:
                    {
                        "_token": "{{ csrf_token() }}",
                        oldpassword:oldpassword,
                        newpassword:newpassword,
                        newcpassword:newcpassword,
                    },
                    success:function(response)
                    {                        
                        if(response.status=='success')
                        {
                            $("#err_msg").html("<font color=red>"+response.message+"</font>");
                            window.location.href="dashboardview";
                        }
                        else
                        {
                            $("#err_msg").html("<font color=red>"+response.message+"</font>");
                        }
                    },
                    error: function(response) 
                    {
                    $('#oldpasswordErrorMsg').text(response.responseJSON.errors.oldpassword);
                    $('#newpasswordErrorMsg').text(response.responseJSON.errors.newpassword);        
                    $('#newcpasswordErrorMsg').text(response.responseJSON.errors.newcpassword);
                    },
                });
             }
        });
    });     
</script>

 @include('_footer')