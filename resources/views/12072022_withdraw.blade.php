@include('_header')
	<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Withdraw</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="withdrawview"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="withdrawview">Withdraw</a></li>
								</ol>
							</div>
							
						</div>
                       
<div class="row">
		<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<label class=" form-label">Select Currency</label>
															<select class="form-control bn">
																<option>USDT</option>
																	<option>BUSD</option>
																		<option>BNB</option>
																			<option>TRX</option>
																				<option>DC</option>
																<option>HRC</option>
															</select>
														</div>
													</div>
												</form>
									</div>
								</div>
							</div>

<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<label class=" form-label">Enter HRC Amount</label>
																<input class="form-control bn" type="" name="">
															<!--<select class="form-control bn">-->
															<!--	<option>-->
															<!--		123-->
															<!--	</option>-->
															<!--</select>-->
														</div>
													</div>
												</form>
									</div>
								</div>
							</div>


</div>

<div class="row">
		<div class="col-sm-12 col-md-12 col-xl-12">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									    <div class="card-body">
										    <form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<label class=" form-label">Withdraw Address</label>
															<input class="form-control bn" type="" name="">
														</div>
													</div>
												</form>
									    </div>
								    </div>
							    </div>
							     </div>
							    </div>
							    
<div class="container ">
<div class="row ">
		<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<label class=" form-label">Withdraw Password</label>
															<input class="form-control bn" type="" name="">
														</div>
													</div>
												</form>
									</div>
								</div>
							</div>

<div class="col-sm-12 col-md-6 col-xl-6">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<div style="justify-content: space-between;" class="d-flex "><label class=" form-label">Total</label>
															<span style="text-align: right;">Fees : 0.25 HRC</span></div>
															<input class="form-control bn" type="" name="">
														</div>
													</div>
												</form>
									</div>
								</div>
							</div>










</div>




<div class="row">
		<div class="col-sm-12 col-md-12 col-xl-12">
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<form class="form-horizontal">
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<div class="d-flex bgf"><div>Available Balance</div> <div>0 HRC</div></div>
															<div style="    justify-content: space-between;
    margin-top: 4px;
    font-size: 12px;
    font-weight: 100;
    padding: 5px 32px;"  class="d-flex"><div>Minimum Amount : 0 HRC</div> <div>Maximum Amount : 0 HRC</div></div>
														</div>
													</div>
<div class="form-group row mb-0">
	<div style="    width: 100%;" class="text-center">
										<a href="#" class="btn btn-primary">Transfer</a> <br>
										<span style="font-size: 12px;
    margin-top: 5px;
    display: block;
    color: #b1a9a9;">Note : Please cross check all details before initiate transfer</span>
									
									</div>
</div>

												</form>
									</div>
								</div>
							</div>

</div>


</div>








					</div>
				</div><!-- end app-content-->
			</div>
	<style>
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
		select.form-control.bn {
    background: #ebeef1;
    color: black;
    font-size: 14px;
    order: none;
}
input.form-control.bn{
	 background: #ebeef1;
    color: black;
    font-size: 14px;
    order: none;}
	</style>
	 @include('_footer')