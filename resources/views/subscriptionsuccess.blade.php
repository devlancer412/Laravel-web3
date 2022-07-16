@include('_header')
                    <div style="justify-content: center;" class="page-header">
                        <div class="page-leftheader">

                        </div>

                    </div>
 <div id="printableArea">
                    <div style="justify-content: center;" class="row">
                        <div class="col-sm-12 col-md-4 col-xl-4">
                            <div class="card overflow-hidden">
                                <div style="background-color: #009640 !important;" class="card-status bg-blue"></div>
                                <div class="card-body">
                                    <divc class="algn"><img style="margin: auto;display: block;" src="assets/images/widget_icon/success.png">
                                        <h3 style="color: #009640;" class="mnb">Payment Success</h3>
                                        <hr style="    margin: 0;
    padding: 0;
    margin-top: 11px;
    margin-bottom: 11px;">
                                        <p style="color: #737373;font-size: 14px;margin-bottom: 30px;text-align: center;">Your Subscription Details<br>
                                            Transaction Refference No : HRC <span  id="transaction"> </span></p>

                                        <div class="row label-1">
                                            <div class="col-md-12">
                                                <label  for="">Customer Name:</label>: <span  id="name1"> </span>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Customer Id:</label>: <span  id="userid"> </span>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Date of Subscription:</label>: <span  id="currentdate"> </span>
                                            </div>
                                            <div class="col-md-12">
                                                <label  for="">Amount Payed:</label>: $<span  id="plan1"> </span>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">No.Of HRC</label>: <span  id="subhrccc1"></span> HRC
                                            </div>
                                            <div class="col-md-12">
                                                <label  for="">Subscription Package:</label>: <span  id="package"> </span> 
                                            </div>
                                            <div class="col-md-12">
                                                <label  for="">Subscription End Date:</label>: <span  id="subenddate"> </span> 
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Transaction Statement</label>: Success
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 40px;" class="row">
                                            <div class="col-md-6 box-a">
                                                <a style="background-color: #5cd65c;color: #fff;padding: 10px 40px;font-size: 16px;border-radius: 10px;"onclick="printDiv('printableArea')" href="#">Print</a>
                                            </div>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>

  </div>
                    </div>
                </div><!-- end app-content-->
            </div>
                    </div><!-- End Page -->

            <style>
                
                .card.overflow-hidden {
                    border-radius: 32px;
                }

                .fb {
                    text-align: right;
                }

                .fb span a {
                    font-size: 14px;
                    margin-right: 5px;
                    margin-bottom: 39px;
                    display: inline-block;
                    margin-top: 30px;
                }

                .fb button {
                    background: #705ec8;
                    border: none;
                    padding: 9px 18px;
                    color: white;
                    border-radius: 10px;
                    font-size: 14px;
                    margin-left: 12px;
                }

                input {
                    background: #ebeef100;
                    color: #3c27a3;
                    font-size: 14px;
                    width: 100%;
                    border: none;
                    border-radius: 10px;
                    padding: 10px;
                    border: solid 1px #c7c7c7;
                    font-weight: 500;
                }

                form.form-horizontal {
                    padding: 0px 57px;
                }

                .mnb {
                    text-align: center;
                    font-size: 18px;
                    margin: 0;
                    padding: 0;
                }

                divc.algn {
                    display: block;
                }

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

                input.form-control.bn {
                    background: #ebeef1;
                    color: black;
                    font-size: 14px;
                    order: none;
                }


                label.form-label {
                    font-size: 14px;
                    color: #444343;
                    font-weight: 400;
                    margin-bottom: 11px;
                }
   .label-1 .col-md-12{margin-bottom: 20px;}
   .label-1 label {width: 190px;font-weight: 300;}
   @media (max-width: 991px) {
    .box-a{margin-top: 40px;}
   }
            </style>
           
        
        
  <!---------------------------Script For Print Button-------------------->
<script type="text/javascript">
  function printDiv(divName) 
  {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>        
	<script>
    $.ajax(
    {
        url:"{{url('subcertificate')}}",
        type: "GET",
        dataType : 'json',
        success: function(result)
        {    
            
            $('#userid').text(result.userid);
            $('#name1').html(result.name);
            $('#package').text(result.package);
            $('#subhrccc1').text(result.subhrccc);
            $('#plan1').text(result.plan);
            $('#currentdate').text(result.currentdate);
            $('#subenddate').text(result.subenddate);
            $('#transaction').text(result.transaction);
        }
    });
    </script>
        @include('_footer')