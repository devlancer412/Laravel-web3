@include('_header')

<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0">Myteam</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href=""><i class="fe fe-layers mr-2 fs-14"></i>Pages</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="#">Myteam</a></li>
		</ol>
	</div>
</div>
<!-- Row -->

<div class="hg_br ">
    <div style="align-items: center;" class="row vcx">
        <div class="col-lg-8 col-sm-12 col-md-5 col-xs-12 ">
	        <div class="blue ">
		        <div style="    align-items: center;" class="d-flex">
			        <div class="mrc">
			            <h3 class="tem"> <span>Name</span> <br> {{$dummy1[0]['c_fname'] }}{{$dummy1[0]['c_lname'] }}  </h3>
				        <br>
				        <h5 class="tem"><span>User ID</span> <br> {{$dummy1[0]['c_username'] }}</h5>
			        </div>
			        <div style="text-align: center;">
				        <img class="mnb" src="{{ asset('assets/images/widget_icon/premium-010.png')}}"> <br>
				        <span>{{$dummy1[0]['plan_type'] }}</span>
			        </div>
		        </div>
	        </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-4  col-xs-12 ">
	        <div class="blue_white">
		        <div class="d-flex">
			    <div>
			    <span class="grym">Total Subscription</span>
			</div>
		<div>
		<span class="bluesd">{{$dummy1[0]['deditedamount'] }}</span>
	</div>
</div>
<div class="d-flex">
	<div>
		<span class="grym">Group A Subscription</span>
	</div>
    <div>
	    <span class="bluesd">{{$dummy1[0]['n_agroup_subscription'] }}</span>
	</div>
</div>
<div class="d-flex">
	<div>
		<span class="grym">Group B Subscription</span>
	</div>
	<div>
		<span class="bluesd">{{$dummy1[0]['n_bgroup_subscription'] }}</span>
	</div>
</div>
	</div>
</div>




						<!--// End Row -->

					</div>



<div id="frst_child">
	<div class="strt">
        <div class="lvl">
		    <h3>	Level {{$level}}</h3>
	    </div>
    </div>

    <div class="gaps">
	    <div class="rws">
		    <div class="d-flex">
            	<div>Username</div>
            	<div>Date of Join</div>
            	<div>Position</div>
            	<div>Subscription</div>
            	<div>Status</div>
            	<div>View Members</div>
        	</div>
        </div>
        @if($dummy)
        @foreach($dummy as $row)
	    <div class="blu-bg">
		    <div class="d-flex">
	            <div class="brm">
		            <div class="mobile">
		                <h3>Username</h3></div>
	                    <span class="nme">{{$row['c_username']}}</span>

                    </div>

	                <div class="brm">
		                <div class="mobile">
		                    <h3>Date of Join</h3></div>
                            {{$row['d_join']}}
                        </div>

                    	<div class="brm">
                    		<div class="mobile">
                    		    <h3>Position</h3>
                		    </div>
                            {{$row['c_position']}}
                        </div>

	                    <div class="brm">

                            <div class="mobile">
		                        <h3>Subscription</h3>
	                        </div>

	                        {{$row['plan_type']}}
                        </div>

	                    <div class="brm">

                            <div class="mobile">
		                        <h3>Status</h3>
	                        </div>
                            @if($row['c_infinity_income_qualified'] == 'Y')
                            Active
                            @else
                            	Not Active
                            	@endif
                    	</div>


	                    <div><span class="rds"><a href="{{ url('geneology')}}/{{base64_encode(rawurlencode($row['pn_id']))}}/{{$level}}">View Members</a></span></div>
	                </div>
                </div>

                @endforeach
@else

<div >
     <h4 style="padding-left:350px;">No data found</h4>
    </div>
@endif

            </div>

        </div>

</div>

        </div>

</div>









			
<style>


.blu-bg:after {
    content: " ";
    position: absolute;
    width: 53px;
    height: 6px;
    top: calc(50% - 3px);
    /* right: 0px; */
    background: #bdb8b0;
    z-index: 1;
    left: -52px;
    /* right: 0; */
    z-index: -1;
}





	.blu-bg .d-flex div {
    flex: 1;
    text-align: center;
}
.rws .d-flex div {
    float: 1;
    text-align: center;
    flex: 1;
}
	span.nme {
    font-size: 16px;
    font-weight: 400;
}
	.blu-bg {
    padding: 11px 21px;
    background: #3f2d97;
    color: white;
    font-size: 14px;
    margin-bottom: 11px;
    border-radius: 8px;
    font-weight: 100;
    position: relative;
}
span.rds {
    background: white;
    color: #3f2d97;
    padding: 7px 15px;
    font-size: 13px;
    border-radius: 50px;
    font-weight: 500;
}
	.strt {
    padding-left: 113px;
    padding-top: 22px;
    margin-bottom: 23px;
}	

.gaps {
    padding: 0px 111px;
}
.rws {
    background: white;
    padding: 9px 21px;
    font-size: 15px;
    border-radius: 8px;
    margin-bottom: 10px;
}
.rws .d-flex {
    justify-content: space-between;
}.blu-bg .d-flex {
    justify-content: space-between;
}
.strt {
    position: relative;
}
.lvl h3:before {
      content: " ";
    position: absolute;
    /* right: 30px; */
    /* top: -15px; */
    border-top: none;
    border-right: 12px solid transparent;
    border-left: 12px solid transparent;
    border-bottom: 12px solid #3f2d97;
    transform: rotate(-89deg);
    left: 97px;
    top: 58%;
}


.lvl:before {
       content: '';
    /* position: absolute; */
    /* width: 5px; */
    /* background: #bdb8b0; */
    /* height: 31px; */
    content: '';
    position: absolute;
    width: 38px;
    height: 2px;
    top: calc(50% - -9px);
    /* right: 0px; */
    background: #bdb8b0;
    z-index: -8;
    left: 68px;
}
.lvl h3:after {
    content: "";
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 4px solid #fff;
    background: #3f2d97;
    position: absolute;
    z-index: 1;
    /* margin-left: 0; */
    left: 49px;
}
.lvl h3 {
    background: #3f2d97;
    color: white;
    width: 124px;
    text-align: center;
    font-size: 17px;
    padding: 7px;
    font-weight: 400;
        border-radius: 11px;
}
div#frst_child {
    position: relative;
}
div#frst_child:before {
    content: '';
    position: absolute;
    width: 5px;
    background: #bdb8b0;
    top: 0;
    /* bottom: 0; */
    /* left: 0; */
    margin-left: 56px;
    /* right: 0; */
    height: 100%;
    border-radius: 5px;
    z-index: -1;
}
.vb:after {
    content: '';
    position: absolute;
    width: 5px;
    background: #bdb8b0;
    top: 0;
    bottom: 0;
    /* left: 0; */
       margin-left: 69px;
    /* right: 0; */
    height: 100%;
    border-radius: 5px;
    z-index: -1;
}
	
	.mrc{
		    margin-right: 27%;
	}
	span.grym {
    color: gray;
    font-size: 16px;
    font-weight: 400;
}
	span.bluesd {
    color: #3f2d97 !important;
    font-weight: 500;
}
	.blue_white .d-flex {
    justify-content: space-between;
       line-height: 36px;
    font-size: 16px;
}
	.blue_white {
    background: white;
    padding: 26px;
    border-radius: 12px;
    position: relative;
    left: -194px;
    box-shadow: rgb(50 50 93 / 25%) 0px 13px 27px -5px, rgb(0 0 0 / 30%) 0px 8px 16px -8px;
}
	h3.tem span,h5.tem span{
    font-weight: 100;
    font-size: 15px;
    margin-bottom: 6px;
    display: inline-block;
}
img.mnb {
    width: 85px;
    margin-bottom: 8px;
}
	.blue {
    background: #3f2d97;
    color: white;
    padding: 38px;
    border-radius: 27px;
}
	h6.text-black.bhv {
    margin-bottom: 9px !important;
}



@media screen and (min-device-width: 768px) and (max-device-width: 1128px) { 
	.blue_white {
    background: white;
    padding: 26px;
    border-radius: 12px;
    position: relative;
    left: 0;
    box-shadow: rgb(50 50 93 / 25%) 0px 13px 27px -5px, rgb(0 0 0 / 30%) 0px 8px 16px -8px;
    margin-top: 17px;
}
.col-lg-8.col-sm-12.col-md-5.col-xs-12 {
    flex: 100% !important;
    max-width: 100% !important;
}
.col-lg-4.col-sm-12.col-md-4.col-xs-12{
	flex: 100% !important;
    max-width: 100% !important;
}
}
@media only screen and (min-width: 1147px) {
.mobile {
    display: none;
}
}



@media only screen and (max-width: 867px) {
.blue_white {
    background: white;
    padding: 26px;
    border-radius: 12px;
    position: relative;
    left: 0;


}
}



@media only screen and (max-width: 1146px) {


	.rws {
    display: none;
}
	.brm {
    border-bottom: solid 1px #e7e7e78f;
    padding-bottom: 6px;
    margin-bottom: 20px;
}
span.nme {
    font-size: 22px;
    font-weight: 500;
}
.blu-bg .d-flex{
	display:inherit !important ;
}
.mobile h3 {
    font-size: 13px;
    font-weight: 300;
    margin: 0;
    margin-bottom: 4px;
}

}

@media only screen and (max-width: 600px) {
.gaps {
    padding: 0px 23px;
}
}




</style>
<script>
    $.ajax(
    {
        url:"{{url('geneologyteam')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {      
            
            $('#copy_url').val(result);
            
        }
    });
</script>
	
@include('_footer')