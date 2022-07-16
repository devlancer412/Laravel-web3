@include('_header')
											
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">EXCHANGE HISTORY</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>EXCHANGE HISTORY</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">HISTORY</a></li>
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
										<div class="card-title">Exchange History</div>
										
									</div>
									<div class="card-body">
										<div class="frmto">
											<form class="gfk">
												<div class="d-flex gh">
														<div class="form-group xd">
														
														<div class="nb">
															<label class=" form-label">From</label>
															<input class="form-control" type="date" name="date">
														</div>
													</div>
													<div class="form-group xd">
														
														<div class="nb">
															<label class=" form-label">To</label>
															<input class="form-control" type="date" name="date">
														</div>
													</div>

														<div style="    margin: 0;" class="form-group">
														
														<div class="nb">
															<button>Search</button>
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
														<th class="wd-15p border-bottom-0">S.No</th>
														
														<th class="wd-20p border-bottom-0">Date & Time</th>
														
														<th class="wd-15p border-bottom-0">Amount</th>
														<th class="wd-15p border-bottom-0">Currency</th>
														<th class="wd-15p border-bottom-0">Fees</th>
														<th class="wd-15p border-bottom-0">Status</th>
														<th class="wd-15p border-bottom-0">Transaction ID</th>
														
														
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														
														<td>Babu123</td>
														<td>3.000000000000 HRC</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														
														
														
													</tr>
													<tr>
														<td>2</td>
													
														<td>Babu123</td>
														<td>3.000000000000 HRC</td>
															<td></td>
														<td></td>
														<td></td>
														<td></td>
													
														
														
													</tr>
													<tr>
														<td>Harry</td>
														
														<td>Babu123</td>
														<td>3.000000000000 HRC</td>
															<td></td>
														<td></td>
														<td></td>
														<td></td>
														
														
														
													</tr>
													
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
    padding: 10px 28px;
    font-size: 14px;
    border-radius: 51px;
    color: white;
}
 </style>
  @include('_footer')
