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
//echo $id;
//echo $table;
//connect to db:
$user = 'root';
 $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
		
$name = $_SESSION["username"];


//fetch asociative array for each value here:
$result = $dbs->query("SELECT Name FROM ITEM WHERE Serial_number = ".$id);
    $row = $result->fetch_assoc();
    $itemName = $row['Name'];
$result = $dbs->query("SELECT Serial_number FROM ITEM WHERE Serial_number = ".$id);
    $row = $result->fetch_assoc();
    $serialNum = $row['Serial_number'];
$result = $dbs->query("SELECT Price FROM ITEM WHERE Serial_number = ".$id);
     $row = $result->fetch_assoc();
    $price = $row['Price'];
$result = $dbs->query("SELECT Company FROM ITEM WHERE Serial_number = ".$id);
     $row = $result->fetch_assoc();
     $Comp = $row['Company'];

//(Cust_username, Name, Item_Serial_number, Price, Company)
$sql = "INSERT INTO CART  VALUES ('".$name."','".$itemName."',".$serialNum.",".$price.",'".$Comp."')";
//echo $sql;
/*$sql = "INSERT INTO CART (Cust_username, Name, Item_Serial_number, Price, Company) VALUES ";
    $sql .= "('" . $name . "', "; // name
    $sql .= "'" . $address . "', "; // address
    $sql .= "'" . $email . "', "; // email
    $sql .= "'" . $username . "', "; // username
    $sql .= "'" . $password . "', "; // password
    $sql .= "'" . $isAdmin . "'"; // is_admin
    $sql .= ")";*/
 $dbs->query($sql).";";
 
 
 
 if($table == "BOOK"){
 $sql = "DELETE FROM ".$table." WHERE ISBN = ".$id;
 }
 else if($table == "CHAIR"){
 $sql = "DELETE FROM ".$table." WHERE Chair_id = ".$id;
 }
 else if($table == "DESK"){
 $sql = "DELETE FROM ".$table." WHERE Desk_id = ".$id;
 }
 else if($table == "LAPTOP"){
 $sql = "DELETE FROM ".$table." WHERE Laptop_id = ".$id;
 }
 else if($table == "OTHERS"){
 $sql = "DELETE FROM ".$table." WHERE Others_id = ".$id;
 } 
 else{echo"no table removed from:";}
 $dbs->query($sql);
 
	
Header("Location: Home.php");

    ?>

  </html>
