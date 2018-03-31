<?php
session_start();

$_SESSION["fromLogin"] = false;
$_SESSION["loggedIn"] = false;

$user = 'root';
$password = '';
$db = 'BOOKSTORE';
//connects to database:
$dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");


?>
<html>
<body>
    <h2 align="center">Register</h2>
    <form action="Home.php" method="post">
        <table align="center">
            <tr>
                <td>Name:</td>
                <td><input required="required" type="text" name="name" required="true"/></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input required="required" type="text" name="username" required="true"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input required="required" type="email" name="email" required="true"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input required="required" type="password" name="password" required="true"/></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input required="required" type="password" name="confirmPassword" required="true"/></td>
            </tr>
            <tr>
                <td><input type="submit" value="register"></td>
            </tr>
        </table>
    </form>
</body>
</html>