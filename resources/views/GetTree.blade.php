<!--<li>-->
<!--	<ul>-->
<!--			<li><h4 href="#" class="first_a" id="{{ $details[0]->pn_id }}">{{ $details[0]->c_username }}&nbsp ({{ $details[0]->c_fname }} {{ $details[0]->c_lname }})</h4>-->
<!--                	<div class="first" id="div_{{ $details[0]->pn_id }}">-->
                	    
<!--                	</div>-->
<!--            </li>-->
<!--		<li>-->
<!--			<ul>-->
<!--				<li></li>-->
<!--			</ul>-->
<!--		</li>-->
<!--		<li></li>-->
<!--	</ul>-->
<!--</li>-->
<ul>
    <!--@dd($details);-->
    <!--@foreach($details as $row)-->
		<li><h4 href="#" class="first_a" id="{{ $details[0]->pn_id }}">{{ $details[0]->c_username }}&nbsp ({{ $details[0]->c_fname }} {{ $details[0]->c_lname }})</h4>
             	<div class="first" id="div_{{ $details[0]->pn_id }}">
                	    
               </div>            
       </li>

    <!--@endforeach-->
<!--	<li>Employees
		<ul>
			<li>Reports</li>
		</ul>
	</li>
	<li>Human Resources</li>-->
</ul>

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
                    dataType:"HTML",
                    success: function(data)
                    {  
                        console.log(data);
                        $('#div_'+id).html(data);
                    },
                    error: function(data) 
                    { 
                        console.log(data); 
                    }       
                });
                console.log('Hi');
            }
            else
            {
            
            }
        });
    });
</script>