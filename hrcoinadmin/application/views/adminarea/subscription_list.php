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
                    <th width="2%">Slno</th>
                    <th width="8%">Userid</th>
                    <th width="20%">Name</th>
                    <th width="6%">Date</th>
                    <th width="16%">Subscription HRC</th>
                    <th width="16%">Plan</th>
                    <th width="13%">Return Date</th>
                    <th width="19%">Total Return Subscription HRC(15 % of subscription)</th>
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

             if($fromdate)
        	{
        		$dobarray=explode('/', $fromdate);
        		$logfromDate=$dobarray[2]."-".$dobarray[0]."-".$dobarray[1];
        	}
        	if($todate)
        	{
        		$dobarray2=explode('/', $todate);
        		$logtoDate=$dobarray2[2]."-".$dobarray2[0]."-".$dobarray2[1];
        
        	}
            $c_username="";
	     	$sqlfrom= "SELECT pn_id,c_username,c_fname,c_lname,	plan_amount,plan_type,sub_end_date,b.created_at,dedited_amount FROM bc_master a, income_plan_history b

			 where a.pn_id=b.user_id AND  DATE_FORMAT(created_at,'%Y-%m-%d') between '$logfromDate' and '$logtoDate'";		

			$result2 = $this->admin_db->get_results($sqlfrom);

			if($result2)

			{

			  $sess_array = array();

			  foreach($result2 as $row2)

			  {
					$count++;
					
					$pn_id = $row2->pn_id;
					
					$c_username = $row2->c_username;

					$c_fname = $row2->c_fname;

					$c_lname = $row2->c_lname;

					$plan_amount = $row2->plan_amount;

					$plan_type = $row2->plan_type;
					
					$dedited_amount = $row2->dedited_amount;

					$sub_end_date = date("d-m-Y",strtotime($row2->sub_end_date));
					
					$created_at = date("d-m-Y",strtotime($row2->created_at));
					
					$total_return_hrc = $dedited_amount+((15/100)*$dedited_amount);
					
					
?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td class="center"><?php echo $c_username ?></td>
                    <td class="center"><?php echo $c_fname." ".$c_lname ?></td>
                    <td class="center"><?php echo $created_at ?></td>
                    <td class="center"><?php echo $plan_amount ?></td>
                    <td class="center"><?php echo $plan_type; ?></td>
                    <td class="center"><?php echo $sub_end_date ?></td>
                    <td class="center"><span class="label-success label label-default"><?php echo $total_return_hrc ?></span></td>
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
