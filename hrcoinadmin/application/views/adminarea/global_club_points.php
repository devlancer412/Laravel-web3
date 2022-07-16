<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Global Club Points Lists</h3>
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
                    <th width="2%">Slno</th>
                    <th width="7%">Date</th>
                    <th width="7%">Total Pool HRC</th>
                    <th width="18%">Eligible Members</th>
                    <th width="5%">Eligible Points</th>
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



	     	$sqlfrom= "SELECT * FROM globalplan_income_payouthdr where  c_status='Y' AND  DATE_FORMAT(d_to,'%m/%d/%Y') between '$fromdate' and '$todate' ";		

			$result2 = $this->admin_db->get_results($sqlfrom);

			if($result2)

			{

			  $sess_array = array();

			  foreach($result2 as $row2)

			  {
					$count++;
					
					$n_id = $row2->n_id;
					
					$d_from = $row2->d_from;

					$d_to = date("d-m-Y",strtotime($row2->d_to));

					$n_total_poolhrc = $row2->n_total_poolhrc;

					$n_eligible_members = $row2->n_eligible_members;

					$n_eligible_income = $row2->n_eligible_income;
					
					$c_status = $row2->c_status;


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
?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td class="center"><?php echo $d_to ?></td>
                    <td class="center"><?php echo $n_total_poolhrc ?></td>
                    <td class="center"><?php echo $n_eligible_members ?></td>
                    <td class="center"><?php echo $n_eligible_income ?></td>
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
