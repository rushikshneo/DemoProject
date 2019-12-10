{!!html_entity_decode($email_header)!!}

<br><br>
    <table class="w3-table w3-striped" style="width: 500px; margin-left:50px">
        <tbody>
            <tr>
               <td>
                 Name :
               </td>
               <td>
                {{$name}}
               </td>
            </tr>
            <tr>
               <td>
                 Email :
               </td>
               <td>
                {{$email}}
               </td>
            </tr>
            <tr>
               <td>
                 Comment :
               </td>
               <td>
                  {{$messages}}
               </td>
            </tr>
        </tbody>
    </table><br>

{!!html_entity_decode($email_footer)!!}