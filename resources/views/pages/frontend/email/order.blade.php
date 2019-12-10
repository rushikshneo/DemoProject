{!!html_entity_decode($email_header)!!}
<br><br>
{!!html_entity_decode($email_main_content)!!}
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<table class="table table-striped projects" style=" width:300px; margin-top:20px;margin-left: 50px;">
	<thead>
	  <tr>
		 <th>
		 	Product
		 </th>
		 <th>
		    Quantity
		 </th>
		 <th>
		 	Unit Price
		 </th>	
		 <th>
		    Total
		 </th>
       </tr>
	</thead>
	<tbody>
		<tr>
			<td>
			     {{$product}}
			</td>
			 <td>
			     {{$quantity}}
			</td>
			  <td>
			      {{$unit_price}}
			</td>
		     <td>
			     {{$total}}
			</td>
		</tr>
	</tbody>
</table>
<p style="margin-left:450px;"><b>Total   : {{$total}}</b></p>

{!!html_entity_decode($email_footer)!!}

<br><br>
<table class="table table-striped projects" style="width: 500px; margin-top:20px;margin-left: 50px;">
<tbody>
	<tr> 
		<th>
			Billing Address
		</th>
		<td>
			{{$billing_address1}}  {{$billing_address2}}<br>
			{{$billing_city}}  {{$billing_state}} <br>
			{{$billing_country}} {{$billing_zip}}
		</td>
	</tr>
	</tbody>
</table>
<p style="margin-left:50px;">Payment method  : {{$ordermethod}}</p>
