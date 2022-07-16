
@include('_header')	

<div style="justify-content: center;" class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">Confirm Subscription</h4>	
	</div>
</div>
                       
<div style="justify-content: center;" class="row">
	<div class="col-sm-12 col-md-4 col-xl-4">
		<div class="card overflow-hidden">
			<div class="card-status bg-blue"></div>
				<div class="card-body">
						<divc class="algn"><img src="assets/images/widget_icon/confirmation.jpg"></div>
						<h3 class="mnb">	Confirm Subscription</h3>
						<hr style="    margin: 0;
						padding: 0;
						margin-top: 11px;
						margin-bottom: 11px;">
						<form class="form-horizontal" id="confirm_form">
							@csrf
							<div class="form-group row ">
								<div class="col-md-12">
									<label class=" form-label">Name</label>
									<input value="" type="text" id="name1" name="c_name"  readonly>
									  
								</div>
							</div>
							<div class="form-group row ">
								<div class="col-md-12">
									<label class=" form-label">User ID</label>
									<input value="" type="text" id="username1" name="c_username" readonly>
									   
								</div>
							</div>
                        
							<div class="form-group row ">
														
								<div class="col-md-12">
									<label class=" form-label">Subscription Package</label>
									<input value="Premium - Topup " type="text" id="sub_package" name="sub_package" readonly>
								</div>
							</div>
							
						
							<div class="form-group row ">							
								<div class="col-md-12">
									<label class=" form-label">Subscription Amount</label>
									<input value="" type="text" id="basichrc" name="sub_amount" >
									
								</div>
							</div>
								<div class="form-group row ">														
								<div class="col-md-12">
									<label class=" form-label">Subscription HRC</label>
									<input value="" type="text" id="basic" name="sub_hrc" readonly>
									
								</div>
							</div>
							<input type="hidden" name="getran" id="getran" value="{{$getran}} ">
							<div class="fb">
								<span><a href="">Go Back</a></span><button type="submit" class="btn btn-primary" id="submit">Confirm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end app-content-->
</div>
	<style>
		.card.overflow-hidden {
    border-radius: 32px;
}
		.fb {
    text-align: right;
}
		.fb span a {
    font-size: 14px;
    margin-right: 5px;
    margin-bottom: 39px;
    display: inline-block;
    margin-top: 30px;
}
		.fb button {
    background: #705ec8;
    border: none;
    padding: 9px 18px;
    color: white;
    border-radius: 10px;
    font-size: 14px;
    margin-left: 12px;
}
		input {
    background: #ebeef100;
    color: #3c27a3;
    font-size: 14px;
    width: 100%;
    border: none;
    border-radius: 10px;
    padding: 10px;
    border: solid 1px #c7c7c7;
    font-weight: 500;
}
		form.form-horizontal {
    padding: 0px 57px;
}
		.mnb{
			    text-align: center;
    font-size: 18px;
    margin: 0;
    padding: 0;
		}
		divc.algn {
    text-align: center;
    display: block;
}
		.d-flex.bgf {
    background: #eaeef1;
    justify-content: space-between;
    padding: 10px 30px;
    font-size: 14px;
    font-weight: 400;
    border-radius: 6px;
}
		label.form-label {
    font-size: 13px;
    color: #444343;
    font-weight: 400;
}
		
input.form-control.bn{
	 background: #ebeef1;
    color: black;
    font-size: 14px;
    order: none;}


label.form-label {
    font-size: 14px;
    color: #444343;
    font-weight: 400;
    margin-bottom: 11px;
}



	</style>


  
  	<script>
    $.ajax(
    {
        url:"{{url('premiumplussubconfirmation')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {    
            
            $('#username1').val(result.username);
            $('#name1').val(result.name);
        }
    });
    </script>
    
    <script>
        $('#confirm_form').on('submit',function(e){
        e.preventDefault();
        var getran = $('#getran').val();
        var name = $('#name1').val();
        var userid = $('#username1').val();
        var planamt = $('#basichrc').val();
        var subpackage = $('#sub_package').val();
        var subhrc = $('#basic').val();
       
         $.ajax(
        {
        url:"{{url('confirmbasicplan')}}",
        type: "post",
        dataType : 'json',
        data:{
            "_token": "{{ csrf_token() }}",
            getran:getran,
            name:name,
            userid:userid,
            planamt:planamt,
            subpackage:subpackage,
            subhrc:subhrc,
          },
         success: function(data)
        {    console.log(data);
            
           
            if(data.status=='success')
            {
                
                        $("#err_msg").html("<font color=red>"+data.message+"</font>");
                       window.location.href="result";
                    }
                    else
                    {
                       
                        $("#err_msg").html("<font color=red>"+data.message+"</font>");
                         window.location.href="subscription";
                    }
           
        }
    });
        });

    </script>
    
     <!-- --------------------------------------------------------Keyup function (name of user)-------------------------------- -->

  <script>
  $('#basichrc').keyup(function(){
    var basichrc=$(this).val();
      $.ajax({
      url:"{{ route('user_name') }}",
      dataType: 'JSON',
      data:{basichrc:basichrc},
      success: function (data)
      {
        
          $('#basic').val(data); 
      }
    });    
  });
</script> 
  @include('_footer')