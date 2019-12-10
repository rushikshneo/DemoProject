<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <h2>Welcome to My Shopping Cart.</h2>
    <table class="w3-table w3-striped" style="width: 500px; margin-left:50px">
        <tbody>
            <tr>
              <td>
                 Email:               </td>
               <td>
                 {{$email}}

               </td>
              </tr>
               @if(!empty($password))
                  <tr> 
                    <td>
                       Password: 
                    </td>
                    <td>
                       {{$password}}
                    </td> 
                 </tr>
               @endif
        </tbody>
    </table>
{!!html_entity_decode($email_content)!!}
