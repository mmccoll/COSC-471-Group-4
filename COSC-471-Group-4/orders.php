<?php
session_start();
//connect to db:
$user = 'root';
$dbpassword = '';
$db = 'BOOKSTORE';
//connects to database
$dbs = new mysqli('localhost', $user, $dbpassword, $db) or die("Unable to connect with db.");

include 'Header.php';
$sql = "select *from orders;";
$result = $dbs->query($sql);
echo "<table border= '1'><tr><th>OrderID</th><th>TOTAL PRICE</th><th>NUM ITEMS</th><th>CUST USER</th><th>DATE PLACED</th></tr>";
if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Order_id"]."</td><td>".$row["Total_price"]."</td><td>".$row["Num_of_items"]."</td><td>".
        $row["Cust_username"]."</td><td>".$row["Date_placed"]."</td></tr>";
    }
} else {echo "table empty";}
echo"</table><br>";
$dbs->close();