<?Php
	$fname=$this->session->userdata('name');
	$id=$this->session->userdata('id');
	//$randomnumber = random_string('alnum', 16);			
	//$this->session->set_userdata('sesran', $randomnumber);	

?>

<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Search and edit user profile</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-body">
            <div class="table-responsive">
              <form role="form" name="form" id="form" method="post"  action="<?php echo base_url() ?>search_user">
                <legend>User Details</legend>
                <div class="form-group col-md-12">
                  <label class="control-label" for="focusedInput">Enter Username</label>
                  <input type="text" class="form-control number" id="c_username" value="<?php echo set_value('c_username') ?>" name="c_username">
                  <span class="error"><?php echo form_error('c_username'); ?></span> </div>
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
