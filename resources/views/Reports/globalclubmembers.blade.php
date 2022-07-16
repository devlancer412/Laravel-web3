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
		<h4 class="page-title mb-0">Global Club Members</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Global Club</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#">Global Club Members</a></li>
		</ol>
	</div>

</div>
						
<div class="row">
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden">
			<div class="card-header rf">
				<h3 class="card-title">Global Club Members</h3>
				<div class="img_wid"><img src="assets/images/widget_icon/subscription icon-01.png"></div>
			</div>
			<div class="card-body">
				<div  class="row">
					<div class="col">
						<h1 class="font-weight-bold mb-1 fs-18"><span  id="globalclubmem">  </span> <span class="ml-4 text-dark fs-20">Members</span>
						<br>	
					</div>
				</div>
		
		    </div>
	    </div>
    </div>
</div>

				</div><!-- end app-content-->
            </div>
						
						<script>
    $.ajax(
    {
        url:"{{url('globalclubmembers')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {      
            $('#globalclubmem').text(result);
          
            
        }
    });
</script>
						@include('_footer')