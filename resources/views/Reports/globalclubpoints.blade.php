@include('_header')	
<!--<style>       -->
<!--  table {counter-reset: no -1;}-->
<!--  table tr{counter-increment: no;}-->
<!--  table tr td:first-child:before{ content: counter(no);}-->
<!--</style>	-->
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
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="master/js/toastr.min.js"></script>		
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Global Club Points</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Global Club</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Global Club Points</a></li>
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
                        

<div class="row">
	<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									
									<div class="card-body bg_yl">
									<div class="pan"> <span>5% of total Turnover</span></div>

									<div class="d-flex olb">
										<div><img src="assets/images/widget_icon/turnovr.png"></div>
										
                                               <div> <br><h3 style="    color: white;
    margin: 0 !important;
    padding: 0 !important;" class="font-weight-bold mb-1 fs-18"> $ <span id="totalbusiness"></span></h3></div>
                                               </div>
									<div class="borde"></div>
									<div><span>Calculation closing daily 00.00</span></div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div style="       background: #ec6446;
    padding: 16px 23px;" class="card-header rf bmn">
										<h3 style="    color: white;
    font-size: 15px;    margin: 0;">	Today’s Income</h3>
									
									</div>
									<div style="background: #ec6446;padding: 26px 23px;" class="card-body bg_yl">
									
	
										<div  class="row">
											<div class="col">
												
											<div style="   align-items: center;
    gap: 16px;
    margin-bottom: 11px;" class="d-flex">
												<div><img src="assets/images/widget_icon/turnovr.png"></div>
												
												<h1 style="    color: white;
    margin: 0 !important;
    padding: 0 !important;" class="font-weight-bold mb-1 fs-18">$ <span id="todayincome"></span><span style="color: white !important;" class="ml-2 text-muted fs-11"></h1>
											</div>
											
										<h4>	<span id="todayincomess"></span><span>hrc</span></h4>
												
												
											</div>
										

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
										<div class="card-title">Global Club Points</div>
										
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
										<table class="table table-bordered text-nowrap" id="global-table">
												<thead>
													<tr>
														
														
                                                        <th class="wd-15p border-bottom-0">Sl.No</th>
														
														<th class="wd-20p border-bottom-0">Date</th>
														
														<th class="wd-15p border-bottom-0">Global Pool Hrc</th>
														
														<th class="wd-15p border-bottom-0">Eligible Members</th>
                                                        
														<th class="wd-15p border-bottom-0">Eligible Points</th>
														
													</tr>
												</thead>
												<tbody>
													
												</tbody>
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
            	.card-body.bg_yl span {
    color: white;
}
            	.bg_yl{
            		background: #5256bf;
            	}
            	.d-flex.olb div span {
    color: white;
    font-size: 22px;
}
.d-flex.olb {
    align-items: center;
    gap: 16px;
    margin-bottom: 12px;
}
.pan {
    margin-bottom: 19px;
}
.pan span {
    border-bottom: solid 1px #ffffff9c;
 
    padding-bottom: 4px;
    /* margin-bottom: 0px; */
        background: white;
    border-radius: 50px;
    color: black !important;
    padding: 8px 19px;
}

.borde {
    border-bottom: solid 1px white;
    padding-bottom: 5px;
    margin-bottom: 8px;
}


.bmn{
	padding: 10px 22px;
    min-height: auto;
}



            </style>
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
            url: "{{ url('global_club_dataload') }}",
            success: function(data) 
            {
            //  console.log(data);
             var check = jQuery.isEmptyObject(data);
                if(check==true){
                
                }else{
                    var output = '';
                    var counter = 0;
                for(var count = 0; count < data.length; count++)
                { 
                  var date = new Date(data[count].d_to);
                  var ymd  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
                    counter++;
                    output += '<tr><td>' +counter+ '</td>';
                    output += '<td>' + ymd + '</td>';
                    output += '<td>' + data[count].n_total_poolhrc + '</td>';
                    output += '<td>' + data[count].n_eligible_members + '</td>';
                    output += '<td>' + data[count].n_eligible_income + '</td></tr>';
                    
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
        url:"{{url('globalbusiness')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {    
           
            $('#totalbusiness').text(result.totalbusiness);
            $('#todayincome').text(result.todayincome);
            $('#todayincomess').text(result.todayincomess);

        }
    });
    </script>
<script>
    $(document).ready( function () {
        $('#global-table').DataTable();
    } );
</script>
@include('_footer')