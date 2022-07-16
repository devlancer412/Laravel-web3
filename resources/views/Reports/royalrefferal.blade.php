
@include('_header')	
<style>       
  table {counter-reset: no -1;}
  table tr{counter-increment: no;}
  table tr td:first-child:before{ content: counter(no);}
</style>	
<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">Top 10 Royal Refferal Members Today</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Royal Refferal</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#">Top 10 Royal Refferal Members Today</a></li>
		</ol>
	</div>

</div>
							
                        <!--End Page header-->
												<!-- Row -->


<div class="row">
	<div class="col-sm-12 col-md-12 col-xl-12">
		<div class="card overflow-hidden">
			<div class="card-status bg-blue"></div>
			    <div class="card-body">
			        <div class="d-flex mjh ol">
				        <div><img src="assets/images/widget_icon/achieve.png"></div>
			            <div><h3>Top Ten Royal Refferal Members Today</h3></div>
                    </div>
                                  
                    <div id="id"></div>
									
										
				</div>
							
					
		    </div>
	    </div>
				
    </div>






<div class="row">
		<div class="col-sm-12 col-md-12">
		<div class="card overflow-hidden">
			<div class="card-status bg-blue"></div>
			 <div class="card-body">
	
			
				        <div style="justify-content: space-between;        gap: 34px;align-items: center;
   " class="d-flex mjh">
				        <!--<div><img src="assets/images/widget_icon/achieve.png"></div>-->
			            <div><h3 style="    font-size: 16px;
    font-weight: 500;margin:0">Qualified Royal Refferal Members List</h3></div>
			            <div style="    flex: 1;">    <select name="data" id="date" >
                    <option value="" selected="selected">Select Date</option>
                    @foreach($data as $dataa)
                        <option value="{{ $dataa->d_to }}"> {{ $dataa->d_to}}</option>
                    @endforeach 
                </select></div>
                    </div>
			
			
		<hr style="    margin: 0;
    margin-top: 19px;">
	<!--		 <div class="col-sm-7">  
                <select name="data" id="date" >
                    <option value="" selected="selected">Select Date</option>
                    @foreach($data as $dataa)
                        <option value="{{ $dataa->d_to }}"> {{ $dataa->d_to}}</option>
                    @endforeach 
                </select>
            </div>-->
                           
			<div style="    margin: 0;
    padding: 25px 0px;" class="card-body">
				<div class="table-responsive">
				    <table class="table table-bordered text-nowrap" >
						<thead>
							<tr>
								<th class="wd-15p">S.No</th>
								
								<th class="wd-20p ">username</th>
								
								<th class="wd-15p ">Total  subscription HRC</th>
								
								
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
 </div>

			<!-- /Row -->

		
	</div><!-- end app-content-->
</div>
</div>
            <style>
            .table thead th, .text-wrap table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #424040;
    border-top: 0;
    border-bottom-width: 1px;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    border: solid 1px #9f9f9f;
    text-align: center;
}
.table-bordered, .text-wrap table, .table-bordered th, .text-wrap table th, .table-bordered td, .text-wrap table td {
    border: 1px solid #9fa1af;
    text-align: center;
    /* border-radius: 20px !important; */
}
            .card-header:before {
    background-color: inherit;
}
            	.d-flex.mjh div img {
    width: 26px;
}
            	.third h4 span {
    font-weight: 200;
    font-size: 14px;
    margin-right: 14px;
}
            	.third h4 {
    margin: 0;
    font-size: 15px;
    font-weight: 400;
}
            	.frst img {
    width: 50px !important;
    height: 50px !important;
    margin-right: 19px;
}
            	.rwo {
    background: #705ec8;
    color: white;
        margin-bottom: 10px;
       padding: 7px 26px;
      border-radius: 19px;
}
            	.d-flex.mjh {
    align-items: center; 
}
.d-flex.mjh {
    margin-bottom: 15px;
}
.d-flex.mjh div h3 {
    margin: 0;
    padding: 0;
    margin-top: 11px;
    margin-left: 16px;
    font-size: 16px;
}
.frst h3 span {
    font-weight: 400;
    font-size: 14px;
}
.frst h3 {
    font-size: 17px;
    margin: 0;
}
br {
    display: none;
}

select#date option {
    background: white;
    color: black;
    border-radius: 16px;
}
select#date {
    width: 100% !important;
    background: white;
    background: #705ec8;
    padding: 11px 20px;
    color: white;
    /* padding: 0; */
    border-radius: 6px;
    outline: 0;
}





@media only screen and (max-width: 800px) {
.d-flex.mjh {
       display: inherit !important;
}
.d-flex.mjh h3 {
    margin-bottom: 13px !important;
}
.d-flex.mjh.ol {
    display: flex !important;
}
}

            </style>
<script>

  $.ajax(
  {
    url:"{{url('royalreferralach')}}",
    type: "GET",
    dataType : 'json',
    success: function(data)
    {     
        
                
                 var output = '';
                for(var count = 0; count < data.length; count++)
                { 

                     output += 	'<div class="rwo">';
						 output += '<div style=" justify-content: space-between;align-items: center;" class="d-flex">';
							output +=	'<div class="frst">';
								output +=	'<div style="align-items: center;" class="d-flex">';
								output +=		'<img class="avatar-xl rounded-circle mb-1" src="assets/images/users/2.jpg">';
								output +=	'<h3>' + data[count].c_username + " "+'('+'<span>' + data[count].c_fname +'</span>'+')'+'</h3>';
								output +=	'</div>';
							output +='</div>';
				// 				output +='<div class="scnd">';
				// 				output +=	'<span>' + data[count].	d_to + '</span>';
				// 			output +=	'</div>';
							output +=	'<div class="third">';
								output +=	'<h4><span>HRC</span>' + data[count].n_today_reff_subscription + '</h4>';
							output +=	'</div>';
						output +=	'</div>';
					output +=	'</div>';
                 
      
                    
                }
                  
                $('#id').html(output);
    }
  });
  </script>
  
  <script>
  $('#date').on('change', function() {
    var optionSelected = $(this).find("option:selected");
    var dateid = optionSelected.val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      type: "post",
      url: "{{ route('dateroyal') }}",
      data: { id: dateid, _token:_token },
      dataType:"json",
      success:function(data)
      {
      
        var output = '';
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
          output += '<tr>';
          output += '<td>' + '</td>';
          output += '<td>' + data[count].c_username + '</td>';
          output += '<td>' + data[count].n_total_subscription + " " + 'HRC' + '</td></tr>';                 
        }
          $('#sponsor').html(output);
       
      }
    });
  });
</script>
@include('_footer')