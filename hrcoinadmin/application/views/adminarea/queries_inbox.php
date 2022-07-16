<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Queries Inbox - Detailed</h3>
          </div>
        </div>
        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <ul class="right-stats" id="mini-nav-right">
            <li><a href="javascript:void(0)" class="btn btn-danger"><span><?Php echo $fromdate ?> to <?Php echo $todate ?></span></a></li>
          </ul>
        <span class="center"><?php //echo $c_username ?></span></div>-->
      </div>
    </div>
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-body">
            <div class="table-responsive">
              <table width="100%" id="responsiveTable" class="table table-striped table-bordered no-margin">
                <thead>
                  <tr>
                    <th>No #</th>
                      <th>Ticketed Date</th>
                      <th>Ticketed By</th>
                      <th>Ticket in</th>
                      <th>Description</th>
                      <th>Uploaded File</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?Php		

	                   $count=0;$fromDate =$toDate ="";
					   $fromDate = date('Y-m-d',strtotime($fromDate));
				       $toDate = date('Y-m-d',strtotime($toDate));
	     	           $sqlfrom= "SELECT *  FROM queries where  c_status='P' and DATE_FORMAT(d_queries_date,'%Y-%m-%d') between '$fromDate' and '$toDate' ";		
						$result2 = $this->admin_db->get_results($sqlfrom);
						if($result2)
						{
						  foreach($result2 as $row)
						  {
								$c_queries_category   = $row->c_queries_type;
								//$c_priority        		= $row->c_priority;
								//$c_subject 				= $row->c_subject;
								$c_description        	= $row->c_queries_description;
								$d_date            		= date("d-m-Y",strtotime($row->d_queries_date));
								$c_image            	= $row->c_image;
								$n_id            	    = $row->n_user_id;
								$sl_no            	    = $row->n_queries_no;
								$sql= "SELECT c_fname,c_username  FROM address_dtl a, bc_master b where a.n_id=b.pn_id and pn_id='$n_id'";		
								$result21 = $this->admin_db->get_results($sql);
								if($result21)
								{
								  foreach($result21 as $row1)
								  {
									$c_fname   = $row1->c_fname;
									$c_username   = $row1->c_username;
								  }
								}
							    $count++;
                       ?>
                  <tr id="<?php echo $row->n_queries_no ?>">
                    <td><?php echo $count ?></td>
                    <td><?php echo $d_date ?></td>
                    <td><?php echo $c_fname ?>(<?php echo $c_username ?>)</td>
                    <td><?php echo $c_queries_category ?></td>
                    <!-- <td><?php echo $c_priority ?></td>
                    <td><?php echo $c_subject ?></td> -->
                    <td><?php echo $c_description; ?></td>
                    <td><?php if($row->c_image!="")
								{
							 ?>
									<a target="_new" href="<?php echo queries_image.$c_image; ?>" rel="prettyPhoto">
									<img src="<?php echo queries_image.$c_image; ?>" style="width: 50px;height: 41px;"></a>
							<?php	
								}else{ 
							?>
									
									<a target="_new" href="<?php echo queries_image?>no-image.png" rel="prettyPhoto"></a>
									<img src="<?php echo queries_image ?>no-image.png" style="width: 50px;height: 41px;"></a>
							<?php 
								 }
							   ?></td>
                    <td><button type="button" class="btn btn-default pull-left" id="id<?php echo $sl_no; ?>" value="<?php echo $sl_no; ?>" data-toggle="modal" data-target="#modal-default" onclick="queries_reply(<?php echo $sl_no; ?>)">Reply</button></td>
                    <!--<td><span><a class="btn btn-info" onclick="reply_complaint(<?php echo $row->sl_no ?>)" href="javascript:;">Reply</a></span></td>-->
                  </tr>
                  <?php
						  }
						}
						?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-default"  style="width:100%">
     <div class="modal-dialog">
		<form id="offer_category">
           <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Reply message</h4>
             </div>
             <div class="modal-body" id="result"></div>
             
           </div>
		</form>
      </div>
   </div>
   <script>



function queries_reply(sl_no)
  	{
	  $.ajax({
		type: "POST",			  
		data:{sl_no:sl_no},
		url: '<?php echo base_url();?>queries_reply',
		success: function(msg) {
				$("#result").html(msg);

		}
	  });
  	}
   
	  </script>