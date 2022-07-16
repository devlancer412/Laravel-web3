@include('_header')
<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Wallet Address</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Wallet Address</a></li>
								</ol>
							</div>
							
						</div>
                        <!--End Page header-->
											
												<!-- Row -->
						<div class="row">
							<div class="col-md-8">
							<div class="row">

							  @foreach($currs as $sym => $name)
							<div class="col-sm-12 col-md-6 col-xl-6 ox1">
								<a href="#" onclick="divVisibility('Div2');">
								<div class="card ">
									<div class="card-body">
										<div style="    justify-content: flex-start;
                                                        align-items: center !important;" class="d-flex no-block align-items-center">
											<div class=" bcc">
											    <!--<a href="#" id="recv-HRCTRC"  onclick="showAddr('HRCTRC')" >-->
											         <a class="active recv-icos" id="recv-{{$sym}}"  onclick="showAddr('{{$sym}}')" >
                                                    <?php $imgSrc = strtolower($sym) . '.png';?>
                                                     <img src="{{asset('/').('assets/images/widget_icon/') }}{{$imgSrc}}" alt=""/>
													
											</div>
											<div>
												<h6 class="text-black bhv"><p>{{ $name }} <span>({{ $sym }})</span></p></span></h6>
											</div>
										</div>
									</div>
								</div>
							</a>
							</div> @endforeach
							</div>
<!--<div class="row">-->
<!--									<div class="col-sm-12 col-md-6 col-xl-6 ">-->
<!--										<a href="#" onclick="divVisibility('Div3');">-->
<!--								<div class="card ">-->
<!--									<div class="card-body">-->
<!--										<div style="    justify-content: flex-start;-->
<!--    align-items: center !important;" class="d-flex no-block align-items-center">-->
<!--											<div class=" bcc">-->
<!--												<img src="assets/images/widget_icon/eth.png">-->
<!--											</div>-->
<!--											<div>-->
<!--												<h6 class="text-black bhv">TRON<br><span style="font-weight: 200;">(TRX)</span></h6>-->
												
<!--											</div>-->
											
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</a>-->
<!--							</div>-->
<!--							<div class="col-sm-12 col-md-6 col-xl-6">-->
<!--								<a href="#" onclick="divVisibility('Div4');">-->
<!--								<div class="card ">-->
<!--									<div class="card-body">-->
<!--										<div style="    justify-content: flex-start;-->
<!--    align-items: center !important;" class="d-flex no-block align-items-center">-->
<!--											<div class=" bcc">-->
<!--												<img src="assets/images/widget_icon/bnb.png">-->
<!--											</div>-->
<!--											<div>-->
<!--												<h6 class="text-black bhv">BINANCECOIN <br><span style="font-weight: 200;">(BNB)</span></h6>-->
												
<!--											</div>-->
											
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</a>-->
<!--							</div>-->
<!--							</div>-->


<!--<div class="row">-->
<!--									<div class="col-sm-12 col-md-6 col-xl-6">-->
<!--										<a href="#" onclick="divVisibility('Div5');">-->
<!--								<div class="card ">-->
<!--									<div class="card-body">-->
<!--										<div style="    justify-content: flex-start;-->
<!--    align-items: center !important;" class="d-flex no-block align-items-center">-->
<!--											<div class=" bcc">-->
<!--												<img src="assets/images/widget_icon/ther.png">-->
<!--											</div>-->
<!--											<div>-->
<!--												<h6 class="text-black bhv">TETHER <br><span style="font-weight: 200;">(USDT)</span></h6>-->
												
<!--											</div>-->
											
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</a>-->
<!--							</div>-->
<!--							<div class="col-sm-12 col-md-6 col-xl-6">-->
<!--								<a href="#" onclick="divVisibility('Div6');">-->
<!--								<div class="card ">-->
<!--									<div class="card-body">-->
<!--										<div style="    justify-content: flex-start;-->
<!--    align-items: center !important;" class="d-flex no-block align-items-center">-->
<!--											<div class=" bcc">-->
<!--												<img src="assets/images/widget_icon/hr.png">-->
<!--											</div>-->
<!--											<div>-->
<!--												<h6 class="text-black bhv">HRC TOKEN (TRC20) <br><span style="font-weight: 200;">(HRC)</span></h6>-->
												
<!--											</div>-->
											
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</a>-->
<!--							</div>-->
<!--							</div>-->


<!--							</div>-->

<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
<div id="qr_code_div" >
			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
										<!--	<img src="assets/images/widget_icon/qr_hrc.png">-->
											 <img src="" id="qrImg" alt=""/>
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<!--<h6 class="text-black bhv">HRC TRC20 WALLET ADDRESS </h6>-->
											 <h2 class="heading1"> <span class="coinName"></span>-<span class="coinSymbol"></h2>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
												    <h2 class="heading1"><span class="coinSymbol"></span>&nbsp;<span class="coinType"></span>&nbsp;Wallet Address</h2>
													  <input type="text" id="copy_addr" name="copy_addr" value="">
												</div>
												<div><button onclick="copyAddress('#copy_addr')"><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div></div>
<div id="Div2" class="non">
    			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
											<img src="assets/images/widget_icon/qr_hrc.png">
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<h6 class="text-black bhv">DUALCHAIN WALLET ADDRESS </h6>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
													  <input type="text" id="fname" name="fname" value="xxxxxxxxxx">
												</div>
												<div><button><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div>
</div>
<div id="Div3" class="non">			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
											<img src="assets/images/widget_icon/qr_hrc.png">
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<h6 class="text-black bhv">TRON WALLET ADDRESS </h6>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
													  <input type="text" id="fname" name="fname" value="xxxxxxxxxx">
												</div>
												<div><button><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div></div>
<div id="Div4" class="non">			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
											<img src="assets/images/widget_icon/qr_hrc.png">
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<h6 class="text-black bhv">BINANCE COIN WALLET ADDRESS </h6>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
													  <input type="text" id="fname" name="fname" value="xxxxxxxxxx">
												</div>
												<div><button><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div></div>
<div id="Div5" class="non">			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
											<img src="assets/images/widget_icon/qr_hrc.png">
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<h6 class="text-black bhv">TETHER WALLET ADDRESS </h6>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
													  <input type="text" id="fname" name="fname" value="xxxxxxxxxx">
												</div>
												<div><button><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div></div>
<div id="Div6" class="non">			<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="hr_qr text-center">
											<img src="assets/images/widget_icon/qr_hrc.png">
										</div>
									</div>
								</div>
								<div class="card overflow-hidden">
									<div class="card-status bg-blue"></div>
									<div class="card-body">
										<div class="cpyqr">
											<h6 class="text-black bhv">HRC TRC20 WALLET ADDRESS </h6>
											<div class="col-md-12d">
												<div style="    flex-direction: column;    text-align: center;" class="d-flexd yum">
												<div >
													  <input type="text" id="fname" name="fname" value="xxxxxxxxxx">
												</div>
												<div><button><img style="    width: 20px;" src="assets/images/widget_icon/copy-01.png"></button></div>
											</div>
											</div>
										</div>
									</div>
								</div></div>
		</div>
	</div>
</div>
						</div>
						<!-- End Row -->

					</div>
				</div><!-- end app-content-->
			</div>
						<!--Footer-->
<style>
	.non{
		display: none;
	}
</style>

<script>
  let addr = <?php echo json_encode($addrs); ?>;
  let currs = <?php echo json_encode($currs); ?>;
  let coinType = {'USDT':'TRC20', 'DC':'TRC20', 'HRC':'TRC20', 'BUSD':'BEP20', 'TRX':'Coin', 'BNB':'Coin', 'HRCTRC':'Coin'};

  $('document').ready(function() {
    showAddr('{{key($currs)}}');
    
   
  });


  function copyAddress(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).val()).select();
    document.execCommand("copy");
    $temp.remove();
    toastr.success('Copied to the clipboard');
  }

  function showAddr(curr) {
     // alert(curr);
     $('.hr_qr').text(curr);
     
    $('.recv-icos').removeClass('active');
    $('#recv-'+curr).addClass('active');
    if(addr[curr] != null && addr[curr] != "") {
      let addrVal = addr[curr];
      let qrVal = "https://chart.googleapis.com/chart?cht=qr&chs=221x220&chl="+addrVal+"&choe=UTF-8&chld=L";
      if(curr != 'HRCTRC') {
        $('#qr_code_div').show();
        $("#copy_addr").val(addrVal);  
        $('#qrImg').attr('src', qrVal);
        $('.coinSymbol').text(curr);
        $('.coinName').text(currs[curr]);
      } else {
        $('.coinSymbol').text("HRC");
        $("#copy_addr").val(addrVal);  
        $('#qr_code_div').hide();
      }
      $('.coinType').text(coinType[curr]);
      
    } else {
      $.ajax({
        url:"{{url('/create_address')}}",
        method:"POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{ 'currency': curr },
        success:function(data) {
          data = $.parseJSON(data);
          if(data.status == 'success'){
            $('#copy_addr').val(data.address);
            let qrVal = "https://chart.googleapis.com/chart?cht=qr&chs=221x220&chl="+data.address+"&choe=UTF-8&chld=L";
            $('#qrImg').attr('src', qrVal);
            $('.coinSymbol').text(curr);
            $('.coinName').text(currs[curr]);
            $('.coinType').text(coinType[curr]);
            addr[curr] = data.address;
            addr['HRCTRC'] = 'HRC TRC20 is under development';
            if(curr == "USDT" || curr == "HRC" || curr == "DC") { addr["TRX"] = data.address; }
            if(curr == "BUSD") { addr["BNB"] = data.address; }
          } else {
            toastr.error(data.msg);
          }
        },
        error:function() {
          toastr.error("Please try again");
        }
      });
    }
  }
</script>
  @include('_footer')
