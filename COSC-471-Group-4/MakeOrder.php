<?php
session_start();
echo"<!DOCTYPE html>
<html> <head>
        <title>Place Order Page</title>
    </head>";

//connect to db:
$user = 'root';
 $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
		
$name = $_SESSION["username"];

//select inside of insert wont work: change to something else:		
$sql ="select sum(Price) as sumPrice from cart where Cust_username = '".$name."';";
$result = $dbs->query($sql);
$row = $result->fetch_assoc();
$sum = $row['sumPrice'];

$sql ="select count(Item_Serial_number) as countItems from cart where Cust_username = '".$name."';";
$result = $dbs->query($sql);
$row = $result->fetch_assoc();
$count = $row['countItems'];

echo $sum.", ".$count;
 $sql = "INSERT INTO ORDERS (Order_id, Total_price, Num_of_items, Cust_username, Date_placed) values (NULL, ".$sum.", ".$count.", '". $name."', '".date(DATE_RFC3339)."');";
 echo $sql;
 $dbs->query($sql);
 
 $sql = "DELETE FROM BOOK WHERE ISBN = (SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."');";
 $dbs->query($sql);
 $sql = "DELETE FROM CHAIR WHERE Chair_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."');";
 $dbs->query($sql);
 $sql = "DELETE FROM DESK WHERE Desk_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."');";
 $dbs->query($sql);
 $sql = "DELETE FROM LAPTOP WHERE Laptop_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."');";
 $dbs->query($sql);
 $sql = "DELETE FROM OTHERS WHERE Others_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."');";
 $dbs->query($sql);
 
 $sql = "SELECT Item_Serial_number FROM CART WHERE Cust_username = '".$name."';";
 echo $sql;
 $result = $dbs->query($sql);
 $row = $result->fetch_assoc();
 $id = $row['Item_Serial_number'];
 
 
 $sql = "DELETE FROM CART WHERE Cust_username = '".$name."';";
 $dbs->query($sql);
 //undefined var:
 
 $sql = "DELETE FROM ITEM WHERE Serial_number = ".$id;
 $dbs->query($sql);
 
 
 Header("Location: Home.php");

 ?>

  </html>