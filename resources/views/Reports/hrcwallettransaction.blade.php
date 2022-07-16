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
								<h4 class="page-title mb-0">HRC Wallet Transaction</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i> Wallet Transaction</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">HRC Wallet Transaction</a></li>
								</ol>
							</div>
						
						</div>
                        <!--End Page header-->
												<!-- Row -->
						<div class="row">
							<div class="col-12">
							

								<!--div-->
								<div class="card">
									<div style="justify-content: space-between;" class="card-header">
										<div class="card-title">HRC Wallet Transaction</div>
										
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
										<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>
													<th class="wd-15p border-bottom-0">Sl.No</th>
														
														<th class="wd-20p border-bottom-0">Date</th>
														
														<th class="wd-15p border-bottom-0">Transaction Type</th>
														<th class="wd-15p border-bottom-0">Transaction HRC</th>
                                                      
													
														
														
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
            url: "{{ url('hrcincomewalletmaster') }}",
            success: function(data) 
            {
             
                var output = '';
                for(var count = 0; count < data.length; count++)
                { 
                  var date = new Date(data[count].d_transcation);
                  var ymd  = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            
                    output += '<tr><td>' + '</td>';
                    output += '<td>' + ymd + '</td>';
                    output += '<td>' + data[count].c_trans_type + '</td>';
                    output += '<td>' + data[count].n_trans_amount + '</td></tr>';
                   
                    
                    
                    
                }
                  
                $('tbody').html(output);
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

@include('_footer')