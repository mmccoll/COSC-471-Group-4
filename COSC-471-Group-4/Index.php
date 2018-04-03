<?php

// restart the session
session_abort();
session_start();
$_SESSION["fromLogin"] = true;
$_SESSION["loggedIn"] = false;

// check if admin account exists in db
// if not, insert an admin account

$user = 'root';
$password = '';
$db = 'BOOKSTORE';
//connects to database
$dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");

// USERS(Name, Address, Email, Username, Password, Is_Admin)

$sql = "SELECT * FROM USERS WHERE Is_Admin='0'";

$result = $dbs->query($sql);
if ($result->num_rows == 0)
{
    $sql = "INSERT INTO USERS (Name, Address, Email, Username, Password, Is_Admin) VALUES ";
    $sql .= "('Admin', '', 'admin471@gmail.com', 'admin', 'admin123', 'true');";
    
    if ($dbs->query($sql) !== TRUE) 
    {
        echo "Error: " . $sql . "<br>" . $dbs->error;
    } 
}


?>
<html>
<title>The Office Supply Store</title>
<body>
    <h2 align="center">Log In</h2>
    <form action="Home.php" method="post">
        <table align="center">
        <tr>
            <td>Username:</td>
            <td><input required="required" type="text" name="username"/></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input required="required" type="password" name="password"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Log In"></button></td>
        </tr>
    </table>
    </form>
    <table align="center">
        <tr>
            <td>
                <a href='Register.php'>
                    <p style="text-align:center">Don't have an account? Create one!</p>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href='ForgotPassword.php'>
            <p style="text-align:center">Forgot Password?</p>
        </a>
            </td>
        </tr>
    </table>
</body>
</html>