<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Infinity Level Income Lists</h3>
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
                    <th width="7%">Date</th>
                    <th width="7%">Userid</th>
                    <th width="18%">Name</th>
                    <th width="5%">Level</th>
                    <th width="6%">Percentage</th>
                    <th width="21%">Subscribed User id</th>
                    <th width="12%">Subscribed HRC</th>
                    <th width="22%">Total points</th>
                    <th width="22%">HRC wallet</th>
                    <th width="22%">Top Up wallet</th>
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


	     	$sqlfrom= "SELECT * FROM daily_referal_pv_count where  DATE_FORMAT(d_to_date,'%Y-%m-%d') between '$logfromDate' and '$logtoDate' order by n_activated_userid,n_level ";		

			$result2 = $this->admin_db->get_results($sqlfrom);

			if($result2)

			{

			  $sess_array = array();

			  foreach($result2 as $row2)

			  {
					$count++;
					
					$n_id = $row2->n_id;
					
					$d_from_date = $row2->d_from_date;

					$d_to_date = date("d-m-Y",strtotime($row2->d_to_date));

					$n_activated_userid = $row2->n_activated_userid;

					$n_user_id = $row2->n_user_id;

					$n_level = $row2->n_level;
					
					$n_total_pv = $row2->n_total_pv;

					$n_percentage = $row2->n_percentage;

					$n_total_income = $row2->n_total_income;
					
					$c_status = $row2->c_status;

					$c_income_status = $row2->c_income_status;
					
					$c_income_type = $row2->c_income_type;
					
					$n_subscribed_hrc = $row2->n_subscribed_hrc;

					$sqlfrom1= "SELECT c_username, c_fname,c_lname FROM bc_master where pn_id='$n_id'";		

					$result21 = $this->admin_db->get_results($sqlfrom1);

					if($result21)

					{


					  foreach($result21 as $row21)

					  {

							$rusername = $row21->c_username;		
							$fname = $row21->c_fname;	
							$lname = $row21->c_lname;	

					  }

					}
					
					$sqlfrom11= "SELECT c_username, c_fname,c_lname FROM bc_master where pn_id='$n_activated_userid'";		

					$result211 = $this->admin_db->get_results($sqlfrom11);

					if($result211)

					{


					  foreach($result211 as $row211)

					  {

							$rusername1 = $row211->c_username;		
							$fname = $row211->c_fname;	
							$lname = $row211->c_lname;	

					  }

					}
					
					$sqlfrom3= "SELECT HRC, top_up_wallet FROM user_wallet where user_id='$n_id'";		

					$result3 = $this->admin_db->get_results($sqlfrom3);

					if($result3)

					{


					  foreach($result3 as $row3)

					  {

							$HRC = $row3->HRC;		
							$top_up_wallet = $row3->top_up_wallet;	

					  }

					}
?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td class="center"><?php echo $d_to_date ?></td>
                    <td class="center"><?php echo $rusername ?></td>
                    <td class="center"><?php echo $fname." ".$lname ?></td>
                    <td class="center"><?php echo $n_level ?></td>
                    <td class="center"><?php echo $n_percentage ?></td>
                    <td class="center"><?php echo $rusername1 ?></td>
                    <td class="center"><?php echo $n_subscribed_hrc ?></td>
                    <td class="center"><span class="label-success label label-default"><?php echo $n_total_income ?></span></td>
                    <td class="center"><?php echo $HRC ?></td>
                    <td class="center"><?php echo $top_up_wallet ?></td>
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
