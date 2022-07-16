@include('_header')	
<!--<style>-->
<!--  table {counter-reset: no -1;}-->
<!--  table tr{counter-increment: no;}-->
<!--  table tr td:first-child:before{ content: counter(no);}-->
<!--</style>-->
<!--<script src="{{ asset('master/js/jquery-3.3.1.min.js')}}"></script> -->
<!--<script src="{{ asset('master/vendors/js/jquery.validate.min.js')}}"></script>-->
<!--<script src="{{ asset('master/js/toastr.min.js')}}"></script>	-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">LEADERSHIP POINTS</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">LEADERSHIP BONUS</a></li>
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
												<!-- Row -->


<div class="row">
	<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden">
									<h4 class="jkl">A Group</h4>
									<div class="card-body hr">
									  <span>$ <span id="groupa"></span></span>
									</div>
								</div>
							</div>
					<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden">
									<h4 class="jkl">B Group</h4>
									<div class="card-body hr">
									  <span>$ <span id="groupb"></span></span>
									</div>
								</div>
							</div>




	<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden brt">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">Current Rank</span>
									 	<h3 style="flex: 1;" id="lrank"></h3>
									 	</div>
									 </div>

									</div>
								</div>
									<div class="card overflow-hidden brt">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">Criteria</span>
									 	<h3 style="flex: 1;" id="Criteria"></h3>
									 	</div>
									 </div>
									 
									</div>
								</div>
									<div class="card overflow-hidden brt">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">POINTS</span>
									 	<h3 style="flex: 1;" id="points"></h3>
									 	</div>
									 </div>
									 
									</div>
								</div>
							</div>




</div>


<div class="row" id="uprank">
		<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden ">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">Upcoming Rank</span>
									 	<h3 style="flex: 1;" id="upcomimgstar"></h3>
									 	</div>
									 </div>

									</div>
								</div>
</div>
		<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden ">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">Criteria</span>
									 	<h3 style="flex: 1;" id="upcriteria"></h3>
									 	</div>
									 </div>

									</div>
								</div>
</div>

		<div class="col-sm-12 col-md-4 col-xl-4">
								<div class="card overflow-hidden ">
									<div class="card-status bg-blue"></div>
									<div class="card-body op">
									 <div class="str">
									 	<div style="      padding: 0px 27px;
  align-items: center;" class="d-flex">
									 		<span style="flex: 1;">POINTS</span>
									 	<h3 style="flex: 1;" id="upcomingpoints"></h3>
									 	</div>
									 </div>

									</div>
								</div>
</div>



</div>



						<div class="row">
							<div class="col-12">
							

								<!--div-->
								<div class="card">
									<div style="justify-content: space-between;" class="card-header">
										<div class="card-title">LEADERSHIP POINTS HISTORY</div>
										
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<table class="table table-bordered text-nowrap" id="table-ref">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">S.No</th>
															<th class="wd-15p border-bottom-0">Date</th>
														<th class="wd-20p border-bottom-0">Group A</th>
														
														<th class="wd-15p border-bottom-0">Group B</th>
														<th class="wd-15p border-bottom-0">Rank</th>
														<th class="wd-15p border-bottom-0">Points</th>
														
														
													</tr>
												</thead>
												<tbody id="sponsor">
												
													
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
            <style>
            	.hr{
            		height: 133px;
            	}
            	.brt{
            		    margin-bottom: 10px

            	}
            	.op{
            		    padding: 0;
    text-align: center;
            	}
            	.str span {
    font-weight: 300;
    font-size: 14px;
}
.str div span {
    font-size: 14px;
    font-weight: 400;
}
.str {
    padding: 11px 0px;
}
            
.jkl{
	    background: #ec6446;
    text-align: center;
    padding: 10px;
    color: white;
}
.str div h3 {
   margin: 0;
    font-size: 15px;
    color: #ffffff;
    background: #705ec8;
    border-radius: 50px;
    display: inline-block;
    padding: 7px;
    font-weight: 400;
}
.card-body span {
    font-size: 21px;
    text-align: center;
    width: 100%;
    font-weight: 500;
    color: #705ec8;
}
.card-body {
   text-align: center;
}


            </style>

<script>

  $.ajax(
  {
    url:"{{url('leadershipbonus')}}",
    type: "GET",
    dataType : 'json',
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
      $('#total_records').text(data.length);
      for(var count = 0; count < data.length; count++)
      {
             counter++;
          var date = new Date(data[count].d_to_date);
          var ymd  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
          
                output += '<tr>';
                output += '<tr><td>' + counter +'</td>';
                output += '<td>' + ymd + '</td>';
                output += '<td>' + data[count].n_left_hrc +'</td>';
                output += '<td>' + data[count].n_right_hrc +'</td>';
                output += '<td>' + data[count].c_rank +'</td>';
                output += '<td>' + data[count].n_income_hrc + '</td><tr>';
       
      }
      $('#sponsor').html(output);
    }
  });
</script>

 <script>
    $.ajax(
    {
        url:"{{url('leaderships')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {
            
            $('#groupa').text(result[0].n_agroup_subscription);
            $('#groupb').text(result[0].n_bgroup_subscription);
        }
    });
    </script>
     <script>
    $.ajax(
    {
        url:"{{url('leadershiprank')}}",
        type: "GET",
        dataType : 'json',
        success: function(data)
        {
           
            $('#Criteria').text( "$" + data.lefthrc + " "+ ":" +" "+"$" + data.righthrc );
            $('#points').text( "$" + data.points);
            $('#upcomimgstar').text(data.upcomimgstar);
            $('#upcriteria').text( "$" + data.upcominglefthrc + " "+ ":" +" "+"$" + data.upcomingrighthrc );
            $('#upcomingpoints').text("$" + data.upcomingpoints);
            $('#lrank').text(data.lrank);
            if(data.upcomimgstar == "")
            {
                 $('#uprank').hide();
            }
        }
    });
    </script>
    
    <script>
    $(document).ready( function () {
        $('#table-ref').DataTable();
    } );
</script>

@include('_footer')