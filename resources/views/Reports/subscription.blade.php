
@include('_header')	
<style>       
  table {counter-reset: no -1;}
  table tr{counter-increment: no;}
  table tr td:first-child:before{ content: counter(no);}
</style>		
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="master/js/toastr.min.js"></script>	
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Subscription Plan</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Subscription Plan</a></li>
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
												<!-- Row -->


@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
								<div class="col-sm-6 col-lg-4">
									<div class="card shadow-none">
										<div class="card-body  pricing bg-gradient-primary">
								<div style="    opacity: 0.2;" class="row">
											<div class="col">
												
												 
												
														<div class="mb-4 fs-14 text-muted whte">
													<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px;
0    padding-bottom: 3px;">Basic Sub</span>scription
												</div>
												
												<h1 class="font-weight-bold mb-1 fs-18">$ <span id="basicplan"></span><span style="color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><i class="fa fa-caret-down"></i><span  id="basicp"> </span>  HRC</span></h1>
											
												<a class="olk" href="subscriptionconfirmation">Subscribe</a>
												
												
											</div>
											<div class="col col-auto img_wid">
												<img style="    width: 34px;" src="assets/images/widget_icon/Basic-01.png">
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4">
									<div class="card shadow-none">
										<div class="card-body pricing bg-gradient-danger">
													<div class="row">
											<div class="col">
												
												 
												
														<div class="mb-4 fs-14 text-muted whte">
													<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px;
    padding-bottom: 3px;">Premium Sub</span>scription
												</div>
												
												<h1 class="font-weight-bold mb-1 fs-18">$ <span id="premiumplan"></span><span style="color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><i class="fa fa-caret-down"></i><span  id="premium"> </span>  HRC</span></h1>
											
												<a class="olk" href="premiumsubscriptionconfirmation">Subscribe</a>
												
											</div>
											<div class="col col-auto img_wid">
												<img style="    width: 34px;" src="assets/images/widget_icon/premium-010.png">
											</div>
										</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-4">
									<div class="card shadow-none">
										<div class="card-body pricing bg-gradient-info">
														<div class="row">
											<div class="col">
												
												 
												
														<div class="mb-4 fs-14 text-muted whte">
													<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px;
    padding-bottom: 3px;">Premium Plus Sub</span>scription
												</div>
												
												<h1 class="font-weight-bold mb-1 fs-18">$<span  id="premiumplanplus"> </span><span style="color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><i class="fa fa-caret-down"></i> 125 +HRC</span></h1>
											
												<a class="olk" href="premiumplussubscriptionconfirmation">Subscribe</a>
												
											</div>
											<div class="col col-auto img_wid">
												<img style="    width: 34px;" src="assets/images/widget_icon/premiumpluss-01.png">
											</div>
										</div>
										</div>
									</div>
								</div>
						
							</div>

<div class="row">
	<div class="col-md-4">
												<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">Market price</h3>
									<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										
											<div class="col">
												
											
												
												<h1 class="font-weight-bold mb-1 fs-18">1 HRC = <span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i>2US</span> Dollar</span></h1>
												
												
												
											</div>
										

									</div>
								 	 
								</div>
									</div>




<div class="col-md-4">
												<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">HRC Wallet</h3>
									<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										
											<div class="col">
												
											
												
												<h1 class="font-weight-bold mb-1 fs-18">$ 280<span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i>27.09966189 </span> HRC</span></h1>
												
												
												
											</div>
										

									</div>
								 	 
								</div>
								 	 
								</div>
									



<div class="col-md-4">
												<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">Topup wallet</h3>
									<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										
											<div class="col">
												
											
												
												<h1 class="font-weight-bold mb-1 fs-18">$ 255<span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i>94.79983094 </span> HRC</span></h1>
												
												
												
											</div>
										

									</div>
								 	 
								</div>
									</div>









</div>

<div class="row">
	<div class="col-md-6">
												<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">Overall Subscription</h3>
									<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										
											<div class="col">
												
											
												
												<h1 class="font-weight-bold mb-1 fs-18">$ 280<span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i>27.09966189 </span> HRC</span></h1>
												
												
												
											</div>
										

									</div>
								 	 
								</div>
									</div>




<div class="col-md-6">
												<div class="card overflow-hidden">
									<div class="card-header rf">
										<h3 class="card-title">General wallet</h3>
									<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
									</div>
									<div class="card-body">
										
											<div class="col">
												
											
												
												<h1 class="font-weight-bold mb-1 fs-18">$ 280<span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i>27.09966189 </span> HRC</span></h1>
												
												
												
											</div>
										

									</div>
								 	 
								</div>
								 	 
								</div>
									













</div>







						<div class="row">
							<div class="col-12">
							

								<!--div-->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Subscription History</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">S.No</th>
														
														<th class="wd-20p border-bottom-0">Date of Subscription</th>
														<th class="wd-15p border-bottom-0">Return Date</th>
														<th class="wd-15p border-bottom-0">Subscription Package</th>
														<th class="wd-15p border-bottom-0">Package Amount</th>
														<th class="wd-15p border-bottom-0">No.of HRC</th>
														<th class="wd-15p border-bottom-0">Return HRC</th>
														
													</tr>
												</thead>
												<tbody>
												
													
												</tbody>
												
											</table>
											 {{ csrf_field() }}
										</div>
									</div>
								</div>
						
							</div>
						</div>
						<!-- /Row -->

					</div>
				</div><!-- end app-content-->
            </div>
            
            
            	<script>
    $.ajax(
    {
        url:"{{url('subscriptiondtl')}}",
        type: "get",
        dataType : 'json',
        success: function(data)
        {      
        
          var output = '';
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
            var date = new Date(data[count].created_at);
                  var ymd  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
              var date = new Date(data[count].sub_end_date);
                  var ymds  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();     
                 
          output += '<tr>';
          output += '<td>' + '</td>';
            output += '<td>' + ymd + '</td>';
             output += '<td>' + ymds + '</td>';
            output += '<td>' + data[count].plan_type + '</td>';
             output += '<td>' + data[count].plan_amount + '</td>';
             output += '<td>' + data[count].dedited_amount + '</td>';
          output += '<td>' + data[count].Returnhrc + '</td></tr>';                 
        }
        $('tbody').html(output);
            
        }
    });
</script>


  	<script>
    $.ajax(
    {
        url:"{{url('subscriptionplan')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {    
          
             $('#basicp').text(result.basicp);
            $('#basicplan').text(result.basicplan);
            $('#premium').text(result.premium);
            $('#premiumplan').text(result.premiumplan);
            $('#premiumplanplus').text(result.premiumplan);
            
        }
    });
    </script>
@include('_footer')