<?php
session_start();
echo"<!DOCTYPE html>
<html> <head>
        <title>Add To Cart Page</title>
    </head>";
//retrieve items from adminpage:
if(!isset($_GET['id']) || !isset($_GET['table'])){
//retrieve values of user /pass: 
//pass into header call to go right back to where we started:
	Header("Location: Home.php");
}
$id = $_GET['id'];
$table = $_GET['table'];
echo $id;
echo $table;
//connect to db:
$user = 'root';
 $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
		
$name = $_SESSION["username"];
$itemName = $dbs->query("SELECT Name FROM ITEM WHERE Id = ".$id);
$serialNum = $dbs->query("SELECT Serial_number FROM ITEM WHERE Id = ".$id);
$price = $dbs->query("SELECT Price FROM ITEM WHERE Id = ".$id);
$Comp = $dbs->query("SELECT Company FROM ITEM WHERE Id = ".$id);

echo $name;
		
$sql = "INSERT INTO CART (Cust_username, Name, Item_Serial_number, Price, Company) VALUES ('".$name."','".$itemName."','".$serialNum."','".$price."','".$Comp."')";
echo $sql;
/*$sql = "INSERT INTO CART (Cust_username, Name, Item_Serial_number, Price, Company) VALUES ";
    $sql .= "('" . $name . "', "; // name
    $sql .= "'" . $address . "', "; // address
    $sql .= "'" . $email . "', "; // email
    $sql .= "'" . $username . "', "; // username
    $sql .= "'" . $password . "', "; // password
    $sql .= "'" . $isAdmin . "'"; // is_admin
    $sql .= ")";*/
 $dbs->query($sql).";";
 
 
 
 if($table = "BOOK"){
 $sql = "DELETE FROM ".$table." WHERE ISBN = ".$id;
 }
 if($table = "CHAIR"){
 $sql = "DELETE FROM ".$table." WHERE Chair_id = ".$id;
 }
 if($table = "DESK"){
 $sql = "DELETE FROM ".$table." WHERE Desk_id = ".$id;
 }
 if($table = "LAPTOP"){
 $sql = "DELETE FROM ".$table." WHERE Laptop_id = ".$id;
 }
 if($table = "OTHERS"){
 $sql = "DELETE FROM ".$table." WHERE Others_id = ".$id;
 } 
 $dbs->query($sql);
 
	
//Header("Location: Home.php");

    ?>

  </html>
