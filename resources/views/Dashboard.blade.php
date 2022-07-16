@include('_header')

<script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate.min.js"></script>
<script src="master/js/toastr.min.js"></script> 
<link rel="stylesheet" href="master/css/toastr.min.css"/>

<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">Welcome <span id="name1"></span></h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="index.html">Dashboard</a></li>
		</ol>
	</div>
</div>

<!--End Page header-->
		<style>
		.latest-timeline {
    height: 319px;
    overflow: scroll;
}
		#chartdiv {
  width: 100%;
  height: 300px;
}
		   .card-body.nb .d-flex div img {
    width: 77px;
}
.sde img {
    margin-bottom: 6px;
}
.d-flex.vd div h3 {
    margin: 0;
    font-weight: 300;
}
.d-flex.vd {
    justify-content: space-between;
    align-items: center;
    color: white;
}
		       .nb {
    background: url(assets/images/widget_icon/load.jpg);
    height: auto;
    background-size: cover;
    padding: 14px 60px
}
.sde h6 {
    margin: 0;
    padding: 0;
    font-weight: 100;
}
.sde {
    text-align: center;
    margin-right: 101px;
}



@media only screen and (max-width: 600px) {
    .nb {
    background: url(assets/images/widget_icon/load.jpg);
    height: auto;
    background-size: cover;
    padding: 14px 12px;
    background-position: center;
}
.sde {
    text-align: center;
    margin-right: 0;
}
}		   
		</style>										
<!-- Row-1 -->
<div class="row">		
	<div class="col-xl-12 col-lg-12 col-md-12 col-xm-12">
		<!-- 	<div class="card overflow-hidden">
			<div class="card-body">

			</div>
		</div> -->
		
		<div class="card overflow-hidden">
			<div class="card-body nb">
				<div class="d-flex vd">
				    <div><h3><span id="username1"></span></h3></div>
				
				    <div class="sde"><img src="assets/images/widget_icon/premiumpluss-01.png"> <h6><span id="c_username"></h6></div>
				</div>
	
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden">
			<div class="card-header rf">
				<h3 class="card-title">Total Subscription</h3>
				<div class="img_wid"><img src="assets/images/widget_icon/subscription icon-01.png"></div>
			</div>
			<div class="card-body">
				<div  class="row">
					<div class="col">
						<h1 class="font-weight-bold mb-1 fs-18">$<span  id="totalsubdollar"> </span> <span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i><span  id="totalsubhrc"> </span></span> HRC</span></h1>
						<br>	
					</div>
				</div>
			</div>
			<div id="spark1"></div> 
		</div>
	</div>
	<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden">
			<div class="card-header rf">
				<h3 class="card-title">HRC Wallet</h3>
			<div class="img_wid"><img src="assets/images/widget_icon/coi.png"></div>
		</div>
		<div class="card-body">
			<div  class="row">
				<div class="col">		
					<h1 class="font-weight-bold mb-1 fs-18">$<span  id="hrcwalletdollar"> </span><span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i><span  id="hrcwallet"> </span> </span> HRC</span></h1>
					<br>	
				</div>
			</div>
		</div>
		<div id="spark2"></div> 
	</div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
	<div class="card overflow-hidden">
		<div class="card-header rf">
			<h3 class="card-title">Top-up</h3>
			<div class="img_wid"><img src="assets/images/widget_icon/top-up.png"></div>
		</div>
		<div class="card-body">
			<div  class="row">
				<div class="col">
					<h1 class="font-weight-bold mb-1 fs-18">$<span  id="topupdollar"> </span> <span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i><span  id="topuphrc"> </span></span> HRC</span></h1>
					<br>
				</div>
			</div>
		</div>
		<div id="spark3"></div> 
	</div>
</div>
</div>
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<div class="card shadow-none">
			<div class="card-body  pricing bg-gradient-primary">
				<div style="    opacity: 0.2;"  class="row">
					<div  class="col">
						<div class="mb-4 fs-14 text-muted whte">
							<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px; padding-bottom: 3px;">Basic Sub</span>scription
						</div>
						<h1 class="font-weight-bold mb-1 fs-18">$<span  id="basicsubscriptiondollar"> </span> <span style="    color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><span class=""><i class="fa fa-caret-down"></i><span  id="basicsubscription"> </span></span> HRC</span></h1>											
						<a  class="olk" href="subscription">Subscribe</a>												
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
				<div  class="row">
					<div class="col">
						<div class="mb-4 fs-14 text-muted whte">
							<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px; padding-bottom: 3px;">Premium Sub</span>scription
						</div>												
						<h1 class="font-weight-bold mb-1 fs-18">$<span  id="premiumsubscriptiondollar"> </span><span style="    color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><span class=""><i class="fa fa-caret-down"></i><span  id="premiumsubscription"> </span></span> HRC</span></h1>											
						<a class="olk" href="subscription">Subscribe</a>												
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
				<div  class="row">
					<div class="col">
						<div class="mb-4 fs-14 text-muted whte">
							<span style="     border-bottom: solid 1px #dbdada;    border-radius: 5px; padding-bottom: 3px;">Premium Plus Sub</span>scription
						</div>
						<h1 class="font-weight-bold mb-1 fs-18">$<span  id="premiumtopupsubscriptiondollar"> </span><span style="    color: white !IMPORTANT;" class="ml-2 text-muted fs-11"><span class=""><i class="fa fa-caret-down"></i><span  id="premiumtopupsubscription"> </span></span> HRC</span></h1>
						<a class="olk" href="subscription">Subscribe</a>												
					</div>
					<div class="col col-auto img_wid">
						<img style="    width: 34px;" src="assets/images/widget_icon/premiumpluss-01.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Row-2 -->
<div class="row">
	<div class="col-xl-8 col-lg-8 col-md-12">
				<div class="card">
									<div class="card-header">
										<h3 class="card-title">Points Earnings</h3>
									
									</div>
									<div class="card-body">
<div class="obx">
    <div>
        				
									  <div>
    <canvas id="myChart"></canvas>
  </div>
		
    </div>
    <div>
    </div>
</div>							
									</div>
								</div>
			
	</div>
	<div class="col-xl-4 col-lg-4 col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Recent Activity</h3>
				<div class="card-options">
					<a href="index.html" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="index.html">Today</a>
						<a class="dropdown-item" href="index.html">Last Week</a>
						<a class="dropdown-item" href="index.html">Last Month</a>
						<a class="dropdown-item" href="index.html">Last Year</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="latest-timeline scrollbar3" id="scrollbar3">
					<ul class="timeline mb-0">
						<li class="mt-0">
							<div class="d-flex"><span class="time-data">Login</span><span class="ml-auto text-muted fs-11"><span id="d_last_login"></span></span></div>

							<!--<p class="text-muted fs-12"><span class="text-info">Joseph Ellison</span> finished task on<a href="index.html" class="font-weight-semibold"> Project Management</a></p>-->
						</li>
						<li>
							<div class="d-flex"><span class="time-data"><span >Logout</span></span><span class="ml-auto text-muted fs-11"><span id="d_last_logout"></span></span></div>
							<!--<p class="text-muted fs-12"><span class="text-info">Elizabeth Scott</span> Product delivered<a href="index.html" class="font-weight-semibold"> Service Management</a></p>-->
						</li>
						<!--<li>-->
						<!--	<div class="d-flex"><span class="time-data">Target Completed</span><span class="ml-auto text-muted fs-11">01 June 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Sonia Peters</span> finished target on<a href="index.html" class="font-weight-semibold"> this month Sales</a></p>-->
						<!--</li>-->
						<!--<li>-->
						<!--	<div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">26 May 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Justin Nash</span> source report on<a href="index.html" class="font-weight-semibold"> Generated</a></p>-->
						<!--</li>-->
						<!--<li>-->
						<!--	<div class="d-flex"><span class="time-data">Dispatched Order</span><span class="ml-auto text-muted fs-11">22 May 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Ella Lambert</span> ontime order delivery <a href="index.html" class="font-weight-semibold">Service Management</a></p>-->
						<!--</li>-->
						<!--<li>-->
						<!--	<div class="d-flex"><span class="time-data">New User Added</span><span class="ml-auto text-muted fs-11">19 May 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Nicola	Blake</span> visit the site<a href="index.html" class="font-weight-semibold"> Membership allocated</a></p>-->
						<!--</li>-->
						<!--<li>-->
						<!--	<div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">15 May 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Richard	Mills</span> source report on<a href="index.html" class="font-weight-semibold"> Generated</a></p>-->
						<!--</li>-->
						<!--<li class="mb-0">-->
						<!--	<div class="d-flex"><span class="time-data">New Order Placed</span><span class="ml-auto text-muted fs-11">11 May 2020</span></div>-->
						<!--	<p class="text-muted fs-12"><span class="text-info">Steven Hart</span> is proces the order<a href="index.html" class="font-weight-semibold"> #987</a></p>-->
						<!--</li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row-2 -->

<!-- Row-3 -->

<!-- End Row-3 -->

<!--Row-->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12">
		<div class="row">
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<div class="card overflow-hidden">
						<div class="card-header rf">
							<h3 class="card-title">Active Referral</h3>
							<div class="img_wid"><img src="assets/images/widget_icon/acve.png"></div>
						</div>
						<div class="card-body">
							<div  class="row">
								<div class="col">
									<h1 class="font-weight-bold mb-1 fs-18"><span  id="activereferral"> </span> <span class="ml-2 text-muted fs-11"><span class="text-danger"></h1>
									<br>
								</div>
							</div>
						</div>
						<div id="spark4"></div> 
					</div>
				</div>
				<div class="col-md-6">
					<div class="card overflow-hidden">
						<div class="card-header rf">
							<h3 class="card-title">Total Earnings</h3>
						<div class="img_wid"><img src="assets/images/widget_icon/fddd.png"></div>
					</div>
					<div class="card-body">
						<div  class="row">
							<div class="col">
								<h1 class="font-weight-bold mb-1 fs-18"><span  id="totalearnings"> </span><span class="ml-2 text-muted fs-11"></span></h1>
								<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card overflow-hidden">
				<div class="card-header rf">
					<h3 class="card-title">Referral ID</h3>
				</div>
				<div class="card-body">
					<div  class="row">
						<div class="col-md-12">
							<div class="d-flexd yum">
								<div style="    flex: 1;">
									<input type="text" id="copy_url" readonly name="copy_url" value="" aria-describedby="basic-addon2">
								</div>
							<div><button><img style="width: 20px;" src="assets/images/widget_icon/copy-01.png" id="basic-addon2"  onclick="copyAddress('#copy_url')"></button></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
</div>

<div class="col-md-4">
	<div class="card bg-primary text-white">									
		<div class="card-body ">

		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			    <?php
			      $var=0;
			      ?>
		@foreach($data as $sym)
   
				<div class="carousel-item @if($var==0) active @endif ">
					<div class="btc"><i class="fa fa-btc" aria-hidden="true"></i></div>
				         <h3>{{ $sym->c_title }}</h3>
						<p>{{ $sym->c_news }}</p>
						<a class="mv" href="#">View More</a>
    				</div>
    		<?php $var++; ?>
    				     @endforeach
        				
          						
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
 
</div>
</div>
</div>
<!--End row-->
</div>
</div>
<!-- End app-content-->
</div>
      
      
<script>
      $( window ).on('load', function() 
      {
        $.ajax(
        {
            url:"{{url('dashboardview')}}",
            type: "GET",
            dataType : 'json',
            success: function(result)
            {   
                
                $('#c_title').text(result.c_title); 
                $('#c_news').text(result.c_news); 

            }
        });
      });    
</script>   

<script>

      $( window ).on('load', function() 
      {
        $.ajax(
        {
            url:"{{url('get_user_datas')}}",
            type: "GET",
            dataType : 'json',
            success: function(result)
            {   
                console.log(result[0].c_fname);
                var fname= result[0].c_fname;
                var lname=result[0].c_lname;
                if(fname==null && lname ==null)
                {
                 var firstname="User";
                 var secondname="User";

                }
                else
                {
                    var firstname=result[0].c_fname;
                    var secondname=result[0].c_lname;
                }                
                 $('#name1').text(firstname +" "+secondname ); 
                 $('#username1').text(firstname +" "+secondname ); 
                 $('#username2').text(firstname +" "+secondname );
                 $('#c_username').text(result[0].c_username);
                 $('#d_last_logout').text(result[0].d_last_logout);
                 $('#d_last_login').text(result[0].d_last_login);
                 $('#username').text(firstname+" "+secondname);
    
            }
        });
      });    
</script>   
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
<script>
    $.ajax(
    {
        url:"{{url('dashboards')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {      
            
            $('#copy_url').val(result);
            
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [ "Infinity Points", "Global Points", "Royal Points", "Leader Ship Points"],
    datasets: 
    [{
      backgroundColor: [
        "#2ecc71",
        "#3498db",
        "#95a5a6",
        "#9b59b6",
   
      ],
      data: [12, 19, 12, 17]
    }]
  }
});
</script>

<script>
    $.ajax(
    {
        url:"{{url('dashboardreport')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {      
            console.log(result.totalsubdollar);
            $('#totalsubhrc').text(result.totalsubhrc);
            $('#totalsubdollar').text(result.totalsubdollar);
            $('#hrcwallet').text(result.hrcwallet);
            $('#hrcwalletdollar').text(result.hrcwalletdollar);
            $('#topuphrc').text(result.topuphrc);
            $('#topupdollar').text(result.topupdollar);
            
            $('#basicsubscription').text(result.basicsubscription);
            $('#basicsubscriptiondollar').text(result.basicsubscriptiondollar);
            $('#premiumsubscription').text(result.premiumsubscription);
            $('#premiumsubscriptiondollar').text(result.premiumsubscriptiondollar);
            $('#premiumtopupsubscription').text(result.premiumtopupsubscription);
            $('#premiumtopupsubscriptiondollar').text(result.premiumtopupsubscriptiondollar);
            $('#activereferral').text(result.activereferral);
            $('#totalearnings').text(result.totalearnings);
            
        }
    });
</script>
@include('_footer')