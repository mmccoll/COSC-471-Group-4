<?php
session_start();
echo"<!DOCTYPE html>
<html> <head>
        <title>Remove From Cart Page</title>
    </head>";
//retrieve items from adminpage:
if(!isset($_GET['id'])){
//retrieve values of user /pass: 
//pass into header call to go right back to where we started:
	Header("Location: Cart.php");
}
$id = $_GET['id'];
//connect to db:
$user = 'root';
 $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
		
$name = $_SESSION["username"];
		
 $sql = "INSERT INTO ITEM (Name, Serial_number, Price, Company) (SELECT * FROM CART WHERE Serial_number = ".$id." AND Cust_username = ".$name.");";
 $dbs->query($sql);
 
 
 $sql = "DELETE FROM CART WHERE Item_Serial_number = ".$id." AND Cust_username = '".$name."';";
 $dbs->query($sql);

 Header("Location: Cart.php");
    ?>

  </html>