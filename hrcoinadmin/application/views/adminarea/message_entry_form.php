
<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title"> </div>
        </div>
      </div>
    </div>
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>Meassages Entry Form</h3>
        <div class="panel panel-blue">
          <div class="panel-body">
            <form id="profilepicform" method="post" enctype="multipart/form-data" action='<?php echo BASE_URL ?>messages_entry_save'>
              <div class="form-group col-md-12">
                <label class="control-label" for="focusedInput">Message : </label>
                <textarea rows="6" required class="form-control" name="c_message" type="text" id="c_message" value=""></textarea>
              </div>
              <div class="form-actions">
                <button type="submit" onclick="loader()" class="btn btn-primary">Submit</button>
                <div id="load"></div>
              </div>
            </form>
          </div>
          
          <table width="1000" class="table table-striped table-bordered no-margin">
            <tr style="font-weight:bold">
              <td width="61">Sl.No</td>
              <td width="622">Message</td>
              <td width="301">Action</td>
            </tr>
            <?php 
					$count=0;
					 $sql = "SELECT * FROM messages where n_status = '1' order by n_id desc";
						$query = $this->db->query($sql);
				
						$query -> num_rows();
				
						if($query -> num_rows() >0)
						{
						   foreach ($query->result() as $row)
						   {
							   $count++;
					?>
            <tr>
              <td><?php echo $count;?></td>
              <td><?php echo $row->c_message ?></td>
              <td><span><a class="btn btn-primary" onclick="delete_message(<?php echo $row->n_id ?>)" href="javascript:;">Delete</a></span></td>
            </tr>
            <?php
						   }
						}
						?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function loader()
{
  $('#load').html('....Please wait....');	
}
function delete_message(id)
{
	var con = confirm("Do you want to delete ?");
	if(con)
	{
	 window.location.href="<?php echo site_url('delete_message/') ?>"+id;	
	}
}
</script>