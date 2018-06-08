<?php
$Name=$_POST["name"];
$con = mysqli_connect("127.0.0.1","root","rootlocal","web_db","3306");
mysqli_query($con,'set names utf8');
if (mysqli_connect_errno($con)) {
    die('Could not connect: ' . mysqli_connect_error());
}
$WT = 1;
$Ma = 2;
$PO = 3;
$TM = 4;
?>

<html>
    <head>
        <title>Welcome to book seller</title>
        <meta charset="utf-8" name="viewport" content="user-scalable=no, width=device-width" />
    </head>
    <body>
        <h1>You are wekcome!</h1>
        <p>customer name: <?php print $Name; ?> </p>
        <br/>

        <table border-"1px" padding="lpx">
            <tr>
                <th>book</th>
                <th>quantity</th>
            </tr>
<?php
$result=mysqli_query($con,"select * from `order` where name = '$Name';");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
<tr>
    <td>".$row["book"]."</td>
    <td>".$row["quantity"]."</td>
</tr>
";
    }
}
mysqli_free_result($result);
mysqli_close($con);
?>
            <br/>
        </table>
    </body>
</html>
