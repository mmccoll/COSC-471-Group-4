<?php

$con = mysqli_connect('localhost','root','12345','BOOKSTORE');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE Username = 'jzhou6'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo $row['Name'] . ";". $row['Address']. ";". $row['Email'] . ";". $row['Username'] . ";". $row['Password']. ";".$row['Is_admin'] ;
}
//echo "</table>";
mysqli_close($con);
?>