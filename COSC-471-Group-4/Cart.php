<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 <?php
session_start();

if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        
$username = $_SESSION["username"];
$password = $_SESSION["password"];
// check if username exists in db
$user = 'root';
$dbpassword = '';
$db = 'BOOKSTORE';
$dbs = new mysqli('localhost', $user, $dbpassword, $db) or die("Unable to connect with db.");
$sql = "SELECT * FROM USERS WHERE Username='" . $username . "' AND Password='" . $password . "'";
$result = $dbs->query($sql);
//$dbs->close();

$loggedIn = $_SESSION["loggedIn"];

if(!$loggedIn)
{  
    // redirect to login page
    header("Location: Index.php");
}

include 'Header.php';
echo "<!DOCTYPE html>
<html> <head>
        <title>Shopping Cart</title>
    </head>
        <h1>Shopping Cart</h1>
    <body>";
       
//$id = $_GET['id'];
//$table = $_GET['table'];

/*$user = 'root';
$password = '';
        $db = 'BOOKSTORE';
        
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");*/
		
$name = $_SESSION["username"];  

 $sql = 'select * from CART;' ;
 $result = $dbs->query($sql);
 
 $strt = "";
 $otherEnd = "";
 
 echo"<h2>Cart Items</h2>";
        echo "<table border='0.5'><tr><th>NAME</th><th>DESCRIPTION</th><th>PRICE</th>".$strt/*.$row['Others_id']*/.$otherEnd."</th></tr>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ITEMID"]."</td><td>".$row["Description"]."</td><td>".$row["PRICE"]."</td></tr>";
            }
        }
        echo "</table><br>";
 
 
 
 $dbs->query($sql);
 $dbs->close();

        
 ?>
