<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Royal Plan Pool HRC Details</h3>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <ul class="right-stats" id="mini-nav-right">
            <li><a href="javascript:void(0)" class="btn btn-danger"><span><?Php echo $fromdate ?> to <?Php echo $todate ?></span></a></li>
          </ul>
        <span class="center"><?php //echo $c_username ?></span></div>
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
                    <th width="9%">Slno</th>
                    <th width="11%"> Date</th>
                    <th width="14%">Total Subscriptions</th>
                    <th width="25%">5% Pool HRC</th>
                    <th width="12%">Eligible Members</th>
                  </tr>
                </thead>
                <tbody>
                  <?Php		

			$ddate = "";

			$amount = 0;

			$fromuserid = "";

			$fromname = "";

			$count=0;

			$userstatus="Registered user";$activecoupon="";$actvatedddate="";$activecoupon=0;



	     	$sqlfrom= "SELECT * FROM royalreferalplan_daily_poolhrc where  c_status='Y' AND  DATE_FORMAT(d_to,'%m/%d/%Y') between '$fromdate' and '$todate'";		

			$result2 = $this->admin_db->get_results($sqlfrom);

			if($result2)

			{

			  $sess_array = array();

			  foreach($result2 as $row2)

			  {
					$count++;
										

					$d_to = date("d-m-Y",strtotime($row2->d_to));
					
					$n_total_turnover = $row2->	n_total_turnover;

					$n_total_poolhrc = $row2->n_total_poolhrc;
					
					$pool_percent = ((5/100)*$n_total_poolhrc);
					
					$n_eligible_members = $row2->n_eligible_members;
					
					
					
?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td class="center"><?php echo $d_to ?></td>
                    <td class="center"><?php echo $n_total_turnover ?></td>
                    <td class="center"><?php echo $pool_percent ?></td>
                    <td class="center"><?php echo $n_eligible_members ?></td>
                  </tr>
                  <?Php

						  }

 			 

		}

		else

		{	

					echo "No data found";
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
