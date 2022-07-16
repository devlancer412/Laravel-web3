@include('_header')	
<!--<style>       -->
<!--  table {counter-reset: no -1;}-->
<!--  table tr{counter-increment: no;}-->
<!--  table tr td:first-child:before{ content: counter(no);}-->
<!--</style>	-->

<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="master/js/toastr.min.js"></script> 
<link rel="stylesheet" href="master/css/toastr.min.css"/>
    <div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">My Referrals</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Infinity Level</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">My Referrals</a></li>
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
                        
  
                        <div class="row">
                             <div class="col-md-4">
								<div class="card overflow-hidden">
									<div class="card-header rf">
									    <h3 class="card-title">Referral ID</h3>
									    <div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										<div class="d-flexd yum">
											<div style="    flex: 1;">
									            <input type="text" id="copy_url" readonly name="copy_url" value="" aria-describedby="basic-addon2">
											</div>
							                <div><button><img style="width: 20px;" src="assets/images/widget_icon/copy-01.png" id="basic-addon2"  onclick="copyAddress('#copy_url')"></button></div>
										</div>
									</div>
								 	 
								</div>
							</div>
	                        <div class="col-md-4">
								<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">Active Referral</h3>
								        <div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										<div class="col" >
											<h1 class="font-weight-bold mb-1 fs-18" ><span id="count"></span> </h1>
										</div>
									</div>
								</div>
							</div>

                            <div class="col-md-4">
								<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title"> Total Referral Subscription</h3>
									    <div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										<div class="col">
											<h1 class="font-weight-bold mb-1 fs-18"><span id="datas"></span> HRC</span></h1>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    
												<!-- Row -->
						<div class="row">
							<div class="col-12">
							

								<!--div-->
								<div class="card">
									<div style="justify-content: space-between;" class="card-header">
										<div class="card-title">My Referrals</div>
										
									</div>
									<div class="card-body">
										<div class="frmto">
											<form class="gfk" id="load_data">
                                                @csrf
												<div class="d-flex gh">
														<div class="form-group xd">
														
														<div class="nb">
															<label class=" form-label">From Date</label>
															<input class="form-control" type="date" name="from_date" id="from_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
														</div>
													</div>
													<div class="form-group xd">
														
														<div class="nb">
															<label class=" form-label">To Date</label>
															<input class="form-control" type="date" name="to_date" id="to_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
														</div>
													</div>

														<div style="    margin: 0;" class="form-group">
														
														<div class="nb">
														    
															<button id="submit" type="button"><svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false" >
                                                        <path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                                    </svg></button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<table class="table table-bordered text-nowrap" id="table-ref">
												<thead>
													<tr>
														
														
                                                        <th class="wd-15p border-bottom-0">Sl.No</th>														
														<th class="wd-20p border-bottom-0"> Joining date</th>														
														<th class="wd-15p border-bottom-0">User Id</th>														
														<th class="wd-15p border-bottom-0">Name</th>                                                      
														<th class="wd-15p border-bottom-0">Phone Number</th>
                                                        <!--<th class="wd-15p border-bottom-0">Joining Plan</th>-->
                                                        <th class="wd-15p border-bottom-0">Total subscription</th>
														
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
						
							</div>
						</div>
						<!-- /Row -->

					</div>
				</div><!-- end app-content-->
            </div>
            <style>

         	.form-group.xd {
    flex: 1;
}
.d-flex.gh {
    justify-content: space-between;
    align-items: center;
}
.d-flex.gh {
    gap: 20px;
    align-items: center;
}
.nb button {
    background: #705ec8;
    border: none;
    padding: 6px 28px;
    font-size: 14px;
    border-radius: 51px;
    color: white;
}
svg.header-icon.search-icon {
    fill: #ffffff !IMPORTANT;
}
@media only screen and (max-width: 800px) {

.d-flex.gh {
    display: inherit !IMPORTANT;
    text-align: center;
}
}
</style>
<script>
	function copyAddress(element)
	{
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).val()).select();
		document.execCommand("copy");
		$temp.remove();
		toastr.success('Copied to the clipboard');
	}
</script>


<!--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>-->
<script>

    $(document).ready(function()
    {
        var _token = $('input[name="_token"]').val();
          fetch_data();
       
        function fetch_data( n_fromdate = '', n_todate = '')
        {
          var n_fromdate=$("#from_date").val();
          var n_todate=$("#to_date").val();
        
        $.ajax(
         {
            type: "POST",       
            data:{n_fromdate:n_fromdate,n_todate:n_todate, _token:_token},
            url: "{{ url('referalfriends') }}",
            success: function(data) 
            {
               
             var user=data[0].c_username;
             if(user==null){
                            //   console.log('ASDFG');

                var output = '<tr></tr>';
                // $('tbody').html(output);
             }else{
                 var output = '';
                 var counter=0;
                for(var count = 0; count < data.length; count++)
                { 
                    counter++;
                  var date = new Date(data[count].d_join);
                  var ymd  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            
                    output += '<tr><td>' + counter +'</td>';
                    output += '<td>' + ymd + '</td>';
                    output += '<td>' + data[count].c_username + '</td>';
                    output += '<td>' + data[count].c_fname + '' + data[count].c_lname+ '</td>';
                    output += '<td>' + data[count].c_mobile + '</td>';
                     output += '<td>' + data[count].dedited_amount + '</td></tr>';
                    
                }
            
                  
                $('tbody').html(output);
             }
                
            }
        });
  }  
  $('#submit').click(function(){
      var n_fromdate=$("#from_date").val();
      var n_todate=$("#to_date").val();
    if(n_fromdate != '' &&  n_todate != '')
    {
      fetch_data(n_fromdate, n_todate);
    }
    else
    {
      alert('Both Date is required');
    }
  });    

    });
  
</script> 

<script>
    $.ajax(
    {
        url:"{{url('referalincome')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
    
         {  
             
            $('#datas').text(result.datas);
            $('#count').text(result.count);

            
        }
    });
</script>
<script>
    $(document).ready( function () {
        $('#table-ref').DataTable();
    } );
</script>
@include('_footer')