{!!html_entity_decode($email_header)!!}
<br><br>
{!!html_entity_decode($email_main_content)!!}
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <table class="w3-table w3-striped" style="width: 500px; margin-left:50px">
        <tbody>
            <tr>
               <td>
                 Order_id :
               </td>
               <td>
                 {{$order_id}}
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