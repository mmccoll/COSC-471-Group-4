<?php
// get the q parameter from URL
$q = $_REQUEST["q"];

$con = mysqli_connect('localhost','root','','BOOKSTORE');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM users WHERE Username = '".$q."';";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo $row['Name'] . ";". $row['Address']. ";". $row['Email'] . ";". $row['Username'] . ";". $row['Password']. ";".$row['Is_admin'] ;
}
//echo "</table>";
mysqli_close($con);
?>