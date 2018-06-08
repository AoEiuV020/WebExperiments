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

?>
<?php
$con = mysqli_connect("127.0.0.1","root","rootlocal","web_db","3306");
mysqli_query($con,'set names utf8');
if (mysqli_connect_errno($con)) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_query($con,"insert into person (name, address, zip) value
      ('".$Name."', '".$Address."', '".$Zip."')
on duplicate key update address=values(address), zip=values(zip);
");
mysqli_query($con,"insert into `order`(name, book, quantity) VALUES
    ('".$Name."', 'Web technology', ".$WebTechnology."),
    ('".$Name."', 'mathematics', ".$Mathmatic."),
    ('".$Name."', 'principle of OS', ".$PrincipleOfOS."),
    ('".$Name."', 'Theory of matrix', ".$TheotyOfMatrix.")
;
");
mysqli_close($con);
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
