@foreach($details as $row)
    <ul id="treeview1">
        <li><h4 href="#" class="first_a" id="{{ $row->pn_id }}">{{ $row->c_username }}&nbsp ({{ $row->c_fname }} {{ $row->c_lname }})</h4>
                 	<div class="first" id="div_{{ $row->pn_id }}">
                    </div>            
            		<ul></ul>
    	</li>
    </ul>	
@endforeach
