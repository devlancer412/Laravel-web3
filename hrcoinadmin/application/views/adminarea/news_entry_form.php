	
<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
          </div>
        </div>
        
      </div>
    </div>
    
    
 <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  <h3>News Entry Form</h3>
        <div class="panel panel-blue">

          <div class="panel-body">
               <form id="profilepicform" method="post" enctype="multipart/form-data" action='<?php echo BASE_URL ?>news_entry_save'>
                	<div class="form-group col-md-12">
            <label class="control-label" for="focusedInput">Title : </label>
          <input required class="form-control" name="c_title" type="text" id="c_title" value=""  />
          </div> 
            <div class="form-group col-md-12">
            <label class="control-label" for="focusedInput">News  : </label>
            <input required  class="form-control" type="text" name="c_news">
          </div>                           
          

           <div class="form-actions">
           <button type="submit" onclick="loader()" class="btn btn-primary">Submit</button>
			<div id="load"></div>
           </div>   
                   </form>
				   
				   
          </div>
		   <h3>News List</h3>
		  <table width="1000" class="table table-striped table-bordered no-margin">
				   <tr style="font-weight:bold">
				     <td>Sl.No</td>
				    <td>Title</td>
					<td>News</td>
					<td>Action</td>
					</tr>
					<?php 
					$count=0;
					 $sql = "SELECT * FROM news where c_status = 'A' order by n_id desc";
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
							<td><?php echo $row->c_title ?> </td>
							<td><?php echo $row->c_news ?></td>
					         <td> <span><a class="btn btn-primary" onclick="delete_news(<?php echo $row->n_id ?>)" href="javascript:;">Delete</a></span></td>
						   
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
function delete_news(id)
{
	var con = confirm("Do you want to delete ?");
	if(con)
	{
	 window.location.href="<?php echo site_url('delete_news/') ?>"+id;	
	}
}
</script>