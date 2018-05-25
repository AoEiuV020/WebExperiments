<?php
$Name=$_POST["name"];
$Address=$_POST["address"];
$Zip=$_POST["zip"];

$WebTechnology=$_POST["WT"];
if($WebTechnology =="") $WebTechnology=0;
$Mathmatic=$_POST["Ma"];
if($Mathmatic =="") $Mathmatic=0;
$PrincipleOfOS=$_POST["PO"];
if($PrincipleOfOS =="") $PrincipleOfOS=0;
$TheotyOfMatrix=$_POST["TM"];
if($TheotyOfMatrix =="") $TheotyOfMatrix =0;

$Payment=$_POST["payment"];

$WT_cost= 5.0 * $WebTechnology;
$Ma_cost= 6.2 *$Mathmatic;
$PO_cost= 10 * $PrincipleOfOS;
$TM_cost= 7.8 * $TheotyOfMatrix;

$total_price = $WT_cost + $Ma_cost+ $PO_cost+ $TM_cost;
$total_items = $WebTechnology +$Mathmatic + $PrincipleOfOS +$TheotyOfMatrix;

$message1 = "$Name has bought $total_items books."; 
$message2 = "$Name paid $total_price."; 
$message3 = "$Name paid by $Payment."; 

$file = fopen("bought.txt", "a");
fwrite($file, $message1."\n");
fwrite($file, $message2."\n");
fwrite($file, $message3."\n");
fflush($file);
fclose($file);


?>
<html>
    <head>
        <title>Welcome to book seller</title>
        <meta charset="utf-8" name="viewport" content="user-scalable=no, width=device-width" />
    </head>
    <body>
        <h1>You are wekcome!</h1>
        <p>customer name: <?php print $Name; ?> </p>
        <p>customer address: <?php print $Address; ?> </p>
        <p>customer zip: <?php print $Zip; ?> </p>
        <br/>

        <table border-"1px" padding="lpx">
            <tr>
                <th>book</th>
                <th>publisher</th>
                <th>price</th>
                <th>total cost</th>
            </tr>
            <tr>
                <td>Web technology</td>
                <td>Spring Press</td>
                <td>$5.0</td>
                <td> <?php print $WT_cost ?> </td>
            </tr>
            <tr>
                <td>Mathmatics</td>
                <td>ACM Press</td>
                <td>$6.2</td>
                <td> <?php print $Ma_cost ?> </td>
            </tr>
            <tr>
                <td>Principle of OS</td>
                <td>Science Press</td>
                <td>$10</td>
                <td> <?php print $PO_cost ?> </td>
            </tr>
            <tr>
                <td>Theory of Matrix</td>
                <td>High Education Press</td>
                <td>$7.8</td>
                <td> <?php print $TM_cost ?> </td>
            </tr>
            <br/>
        </table>
        <p> <?php print $message1; ?> </p>
        <p> <?php print $message2; ?> </p>
        <p> <?php print $message3; ?> </p>
    </body>
</html>
