<div class="dashboard-wrapper">
  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Joining Lists</h3>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <ul class="right-stats" id="mini-nav-right">
            <li><a href="javascript:void(0)" class="btn btn-danger"><span><?Php echo $fromdate ?> to <?Php echo $todate ?></span></a></li>
          </ul>
        </div>
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
                    <th width="3%">Slno</th>
                    <th width="9%">Userid</th>
                    <th width="15%">Name</th>
                    <th width="8%">Phone</th>
                    <th width="22%">E-mail</th>
                    <th width="22%">Sponsor id</th>
                    <th width="11%">Sponsor Name</th>
                    <th width="11%">Date of Join</th>
                    <th width="16%">Total Subscription</th>
                    <th width="16%">Active/Inactive</th>
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



	     	$sqlfrom= "SELECT pn_id,c_username,c_fname,c_lname,	c_mobile,c_email,n_ref_id,d_join,c_aflag FROM bc_master

			 where  DATE_FORMAT(d_join,'%m/%d/%Y') between '$fromdate' and '$todate'";		

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

					$c_mobile = $row2->c_mobile;

					$c_email = $row2->c_email;

					$n_ref_id = $row2->n_ref_id;

					$d_join = date("d-m-Y",strtotime($row2->d_join));
					
					$c_aflag = $row2->c_aflag;

					if($c_aflag=='Y')
						$status = "Active";
					else
						$status="Not active";

					$sqlfrom= "SELECT c_username, c_fname,c_lname FROM bc_master where pn_id='$n_ref_id'";		

					$result2 = $this->admin_db->get_results($sqlfrom);

					if($result2)

					{


					  foreach($result2 as $row2)

					  {

							$c_sponsorusername = $row2->c_username;		
							$c_sponsorfname = $row2->c_fname;	
							$c_sponsorlname = $row2->c_lname;	

					  }

					}
					$sqlfrom1= "SELECT SUM(dedited_amount) as dedited_amount FROM income_plan_history where user_id='$pn_id'";		

					$result21 = $this->admin_db->get_results($sqlfrom1);

					if($result21)

					{


					  foreach($result21 as $row21)

					  {

							$dedited_amount = $row21->dedited_amount;		
					  }

					}
					
					
?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td class="center"><?php echo $c_username ?></td>
                    <td class="center"><?php echo $c_fname." ".$c_lname ?></td>
                    <td class="center"><?php echo $c_mobile ?></td>
                    <td class="center"><?php echo $c_email ?></td>
                    <td class="center"><?php echo $c_sponsorusername; ?></td>
                    <td class="center"><?php echo $c_sponsorfname." ".$c_sponsorlname ?></td>
                    <td class="center"><span class="label-success label label-default"><?php echo $d_join; ?></span></td>
                    <td class="center"><?php echo $dedited_amount ?></td>
                    <td class="center"><?php echo $status ?></td>
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
