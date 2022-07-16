<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  $(function() {
    $( "#datepicker2" ).datepicker();
  });  
  </script>
<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Subscription Lists</h3>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <ul class="right-stats" id="mini-nav-right">
            <li><a href="javascript:void(0)" class="btn btn-danger"><span>Select Date for Subscription List</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-body">
            <div class="table-responsive">
              <form role="form" name="form" id="form" method="post"  action="<?Php echo base_url() ?>subscription_list">
                <legend>Select From - To Date </legend>
                <div class="form-group col-md-6">
                  <label class="control-label" for="focusedInput">From Date</label>
                  <input type="text" id="datepicker" name="fromdate" class="form-control">
                  <?Php echo form_error('from_date'); ?> </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="focusedInput">To Date</label>
                  <input type="text" id="datepicker2" name="todate" class="form-control">
                  <?Php echo form_error('C_SHARE'); ?> </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
