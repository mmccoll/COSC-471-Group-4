<?php
session_start();
// get user data
$fromLoginPage = $_SESSION["fromLogin"];
$loggedIn = $_SESSION["loggedIn"];

$username = "";
$password = "";

// if we're logged in, grab the username and password from the session
// otherwise, grab from the post
if($loggedIn)
{
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
}
else
{
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$user = 'root';
$dbpassword = '';
$db = 'BOOKSTORE';
//connects to database
$dbs = new mysqli('localhost', $user, $dbpassword, $db) or die("Unable to connect with db.");

if ($fromLoginPage == false)
{
    // create a user with first/last name, email, and password    
    $address = '';
    $isAdmin = "0";
    $email = $_POST["email"];
    $name = $_POST["name"];

    //$sql = "INSERT INTO USERS (firstname, lastname, email, password) VALUES ('John', 'Doe', 'john@example.com')";
    // USERS(Name, Address, Email, Username, Password, Is_Admin)
    $sql = "INSERT INTO USERS (Name, Address, Email, Username, Password, Is_Admin) VALUES ";
    $sql .= "('" . $name . "', "; // name
    $sql .= "'" . $address . "', "; // address
    $sql .= "'" . $email . "', "; // email
    $sql .= "'" . $username . "', "; // username
    $sql .= "'" . $password . "', "; // password
    $sql .= "'" . $isAdmin . "'"; // is_admin
    $sql .= ")";
    

    if ($dbs->query($sql) !== TRUE) 
    {
        echo "Error: " . $sql . "<br>" . $dbs->error;
    } 
}


// check if username exists in db
$sql = "SELECT * FROM USERS WHERE Username='" . $username . "' AND Password='" . $password . "'";
$result = $dbs->query($sql);

//check if admin or not:
$row = $result->fetch_assoc();
if($row['Is_admin'] == 'true'){
    //if so, redirect to admin page:
    header("Location: Admin.php");
} // else: continue on as a user:
$dbs->close();

if($result->num_rows == 0)
{  
    // redirect to login page
    header("Location: Index.php");
}
else
{
    // save the username in the session so we know the user is logged in
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $_SESSION["loggedIn"] = true;
}

include 'Header.php';
?>
<html>
    <title>
        Office Supply Store
    </title>
    <body>
        
    </body>
    <?php
    include 'Footer.php';
    ?>
</html>