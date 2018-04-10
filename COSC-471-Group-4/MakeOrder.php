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

		
 $sql = "INSERT INTO ORDERS (Total_price, Num_of_items, Cust_username, Date_placed) (SELECT SUM (Price), COUNT (Item_Serial_Number) FROM CART WHERE Cust_username = ".$name."), ". $name.", ".date("Y/m/d").";";
 $dbs->query($sql);
 
 /*$sql = "DELETE FROM BOOK WHERE ISBN = (SELECT Item_Serial_number FROM CART WHERE Cust_username = ".$name.");";
 $dbs->query($sql);
 $sql = "DELETE FROM CHAIR WHERE Chair_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = ".$name.");";
 $dbs->query($sql);
 $sql = "DELETE FROM DESK WHERE Desk_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = ".$name.");";
 $dbs->query($sql);
 $sql = "DELETE FROM LAPTOP WHERE Laptop_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = ".$name.");";
 $dbs->query($sql);
 $sql = "DELETE FROM OTHERS WHERE Others_id = (SELECT Item_Serial_number FROM CART WHERE Cust_username = ".$name.");";
 $dbs->query($sql);*/
 
 
 
 $sql = "DELETE FROM CART WHERE Cust_username = ".$name.";";
 $dbs->query($sql);
 
 $sql = "DELETE FROM ITEM WHERE Serial_number = ".$id;
 $dbs->query($sql);
 
 
 Header("Location: Order.php");

 ?>

  </html>