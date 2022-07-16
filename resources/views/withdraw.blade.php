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
									
										<form class="form-horizontal" action="{{url('send_amount')}}"  id="withForm" method="post" autocomplete="off" onsubmit="startLoader('#withdraw_submit', '#withdraw_loader', '#withForm')">
                                            {{csrf_field()}}
													
													<div class="form-group row mb-0">
														
														<div class="col-md-12">
															<label class=" form-label">Select Currency</label>
															<select class="form-control bn" name="currency" id="selCurr" onchange="getCurrInfo(this.value)">
															    <?php foreach ($withs as $key => $value) {?>
                                                                  <option value="{{$key}}">{{$key}}</option>
                                                                <?php }?>
                                            					<!--<option>USDT</option>-->
																<!--	<option>BUSD</option>-->
																<!--		<option>BNB</option>-->
																<!--			<option>TRX</option>-->
																<!--				<option>DC</option>-->
																<!--<option>HRC</option>-->
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
																<input class="form-control bn" id="amount" placeholder="Enter Amount" name="amount"  onkeypress="return (event.charCode == 8 || event.charCode == 46) ? null : event.charCode >= 48 && event.charCode <= 57" >
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
															<input class="form-control bn" id="address" placeholder="Enter Withdraw Address" name="address">
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
															<input class="form-control bn" id="with_pass" name="with_pass" placeholder="Withdraw Password" type="password">
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
															<span style="text-align: right;">Fees : <span id="feeVal"></span> <span class="currVal"></span></span></div>
															<input class="form-control bn"  id="totVal" disabled value="0">
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
															<div class="d-flex bgf"><div>Available Balance</div> <div><span id="balVal"></span> <span class="currVal"></span></div></div>
															<div style="    justify-content: space-between;
    margin-top: 4px;
    font-size: 12px;
    font-weight: 100;
    padding: 5px 32px;"  class="d-flex"><div>Minimum Amount : <span id="minVal"></span> <span class="currVal"></span></div> <div>Maximum Amount : <span id="maxVal"></span> <span class="currVal"></span></div></div>
														</div>
													</div>
<div class="form-group row mb-0">
	<div style="    width: 100%;" class="text-center">
						<button class="btn btn-primary " type="submit" id="withdraw_submit" onclick="return confirm('Do you really want to withdraw');">Withdraw</button>
                        <div id="withdraw_loader" style="display:none;"><i class="fas fa-2x fa-circle-notch fa-spin"></i></div> <br>
										<span style="font-size: 12px;margin-top: 5px;display: block;color: #b1a9a9;">Note : Please cross check all details before initiate transfer</span>
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
    <script src="master/js/jquery-3.3.1.min.js"></script> 
<script src="master/vendors/js/jquery.validate1.min.js"></script>	
    <script>
      let withs = <?php echo json_encode($withs); ?>;

    //   console.log(withs[0]);

      $('document').ready(function() {
        curr = $.trim($('#selCurr').val());
        getCurrInfo(curr);
      });

      function getCurrInfo(curr) {
        $('.currVal').text(curr);
       // validator.resetForm();
        $('#minVal').text(parseFloat(withs[curr].min));
        $('#maxVal').text(parseFloat(withs[curr].max));
        $('#balVal').text(parseFloat(withs[curr].balance));
        $('#amount').val('');
        $("#feeVal").text(parseFloat(withs[curr].fees));
        $("#totVal").val("0");
       
      }

      $("#amount").keyup(function() {
        let amount = parseFloat($("#amount").val());
        let curr = $("#selCurr").val();
        let total = amount - parseFloat(withs[curr].fees);
        total = total.toFixed(8);
        $("#totVal").val(total);
      });

      var validator = $('#withForm').validate({
        rules: {
          currency: {
            required:true,
          },
          amount: {
            required:true,
            number:true,
          },
          address: {
            required:true
          },
         
          with_pass: {
            required:true
          },
         
        },
        messages: {
          currency: {
            required: "Select currency"
          },
          amount: {
            required: "Enter amount",
            number: "Enter valid amount"
          },
          address: {
            required:"Enter Withdraw address"
          },
         
          with_pass: {
            required:"Enter withdraw password"
          },
        
        },
        submitHandler:function(form) {
          let amount = parseFloat($("#amount").val());
          let curr = $("#selCurr").val();
          let minAmt = parseFloat(withs[curr].min);
          let maxAmt = parseFloat(withs[curr].max);
          let bal = parseFloat(withs[curr].balance);
          if(amount < minAmt) {
            let msg = "Minimum amount is : "+minAmt;
            toastr.error(msg);
            stopLoader('#withdraw_submit', '#withdraw_loader', '#withForm')
            return false;
          } else if(amount > maxAmt) {
            let msg = "Maximum amount is : "+maxAmt;
            toastr.error(msg);
            stopLoader('#withdraw_submit', '#withdraw_loader', '#withForm')
            return false;
          } else if(amount > bal) {
            toastr.error('Insufficient balance');
            stopLoader('#withdraw_submit', '#withdraw_loader', '#withForm')
            return false;
          } else {
            form.submit();
          }
        }
      });
    </script>

	 @include('_footer')