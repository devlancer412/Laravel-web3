      

@include('_header')	
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Myteam</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Myteam</a></li>
								</ol>
							</div>
							
						</div>
                        <!--End Page header-->
												<!-- Row -->
												<div class="hg_br ">
						<div style="align-items: center;" class="row vcx">



		<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<ul id="treeview1">
											<!--<li><h4 href="#" class="first_a" id="{{ $datas[0]->pn_id }}">{{ $datas[0]->c_username }}&nbsp ({{ $datas[0]->c_fname }} {{ $datas[0]->c_lname }})</h4>-->
											<!--<div class="first" id="div_{{ $datas[0]->pn_id }}">-->
											    
											<!--</div>-->
										    <li><h4 href="#" class="first_a" id="{{ $datas[0]->pn_id }}">{{ $datas[0]->c_username }}&nbsp ({{ $datas[0]->c_fname }} {{ $datas[0]->c_lname }})</h4>
                                                    <div class="first" id="div_{{ $datas[0]->pn_id }}">
										            </div>
												
											</li>
											<!--</li>-->
											<!--<li>XRP-->
											<!--	<ul>-->
											<!--		<li>Company Maintenance</li>-->
											<!--		<li>Employees-->
											<!--			<ul>-->
											<!--				<li>Reports</li>-->
											<!--			</ul>-->
											<!--		</li>-->
											<!--		<li>Human Resources</li>-->
											<!--	</ul>-->
											<!--</li>-->
										</ul>
									</div>
								</div>

							</div>
						<!-- End Row -->

					</div>
</div>
				</div>
			</div>
<script>
    $(document).ready(function(){
       
        $('body').on('click','.first_a',function(){
             
     
            console.log($(this).attr('id'));
            var id=$(this).attr('id');
            var len=$('div_'+id).length;
            console.log(len);
              
            if(len==0)
            {
                $.ajax({
                    type: "POST",  
                    url: "get_tree_users",
                    data:{id:id,_token:"{{ csrf_token() }}"},
                   // dataType:"HTML",
                    success: function(data)
                    {
                        if(data)
                        {
                      
                        console.log(data);
                        $('#div_'+id).html(data);
                        }
                        else
                        {
                           $('#div_'+id).html('No data found');  
                        }
                    },
                    error: function(data) 
                    { 
                        console.log(data); 
                    }       
                });
                // console.log('Hi');
            }
            else
            {
            
            }
        });
    });
</script>	
			

@include('_footer')
