<?php 

if(isset($_POST['convert']))
{
    $amount=$_POST['amount'];
    $from=$_POST['from'];
    $to=$_POST['to'];
currency_convert($amount,$from,$to);
}
function currency_convert($amount,$from,$to)
{
  $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);  
  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
  echo $converted_amount;
}

?>
<html>
    <head>
        <title>
            CURRENCY CONVERTER
        </title>
    </head>
    <Body>
        <form action="" method="post">
            <table>
                <tr>
                    <td> Amount::</td><td> <input type="text" name="amount"/></td></tr>
                <tr><td>From::</td><td><input type="text" name="from"/> <br/></td></tr>
                <tr><td> To::</td><td><input type="text" name="to"/><br/></td></tr>
                <tr><td colspan="2" ><input type="submit" name="convert"/></td></tr>
            </table>
        </form>  
    </Body>
</html>