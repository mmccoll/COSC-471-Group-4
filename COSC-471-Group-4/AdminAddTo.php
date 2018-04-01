<?php
session_start();
echo"<!DOCTYPE html>
<html> <head>
        <title>Admin Add</title>
    </head>
        <h1>Admin Add Page</h1>
    <body>";
//retrieve items from adminpage:
if(!isset($_GET['id']) || !isset($_GET['table'])){
//retrieve values of user /pass: 
//pass into header call to go right back to where we started:
	Header("Location: Admin.php");
}
$id = $_GET['id'];
$table = $_GET['table'];
//connect to db:
$user = 'root';
        $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
//print out first row of table:
/*switch($table){
    case 'BOOK':
        echo "<table border= '1'><tr><th>ISBN</th><th>AUTHOR</th><th>EDITION</th><th>TITLE</th><th>RATING</th><th>GENRE</th><th>PUBLISHER</th><th>ADD</th></tr>";break;
    case 'CHAIR':
         echo "<table><tr><th>ChairID</th><th>NUM LEGS</th><th>NUM WHEELS</th><th>MATERIAL</th><th>COLOR</th><th>ADD</th></tr>";break;
    case 'DESK':
        echo "<table><tr><th>DeskID</th><th>NUM LEGS</th><th>NUM DRAWERS</th><th>MATERIAL</th><th>SQRFT</th><th>COLOR</th><th>ADD</th></tr>";break;
    case 'LAPTOP':
        echo "<table><tr><th>LaptopID</th><th>MODEL</th><th>PROCESSOR</th><th>HDD(GB)</th><th>RAM(GB)</th><th>YEAR</th><th>SCREEN SIZE</th><th>COLOR</th><th>ADD</th></tr>";break;
    case 'OTHER':
        echo "<table><tr><th>OTHERID</th><th>DESCRIPTION</th><th>ADD</th></tr>"; break;
    default: echo"NO TABLE SELECTED"; break;   
}*/
//print out form to handle all of the inputs for apropriate table:
?>
<form action='processSQL.php' method='get'>
    <?php
    //switch to check which outputs we need to have in the form:
    //each submit button has unique name, and will checked in processSQL.php:
    switch($table){
    case 'BOOK':
        echo"Price($):    <input type='text' name='price'><br>";
        echo"Isbn(13):     <input type='text' name='isbn'><br>";
        echo"Author:   <input type='text' name='author'><br>";
        echo"Edition:  <input type='text' name='edition'><br>";
        echo"Title:    <input type='text' name='title'><br>";
        echo"Rating:   <input type='text' name='rating'><br>";
        echo"Genre:    <input type='text' name='genre'><br>";
        echo"Publisher:<input type='text' name='publisher'><br>";
        echo"Submit:   <input type='submit' name='booksub' value='ADD'><br>";
         break;
    case 'CHAIR':
        echo"SerialNum:<input type='text' name='serialnumber'><br>";
        echo"Price($):    <input type='text' name='price'><br>";
        echo"Name:    <input type='text' name='name'><br>";
        echo"Company:  <input type='text' name='company'><br>";
        echo"ChairID:  <input type='text' name='chairid'><br>";
        echo"NumLegs:  <input type='text' name='numlegs'><br>";
        echo"NumWheels:<input type='text' name='numwheels'><br>";
        echo"Material: <input type='text' name='material'><br>";
        echo"Color:    <input type='text' name='color'><br>";
        echo"Submit:   <input type='text' name='chairsub'value='ADD'><br>";
         break;
    case 'DESK':
       echo"SerialNum:<input type='text' name='serialnumber'><br>";
        echo"Price($):    <input type='text' name='price'><br>";
        echo"Company:  <input type='text' name='company'><br>";
        echo"Name:    <input type='text' name='name'><br>";
        echo"DeskID:     <input type='text' name='deskid'><br>";
        echo"NumLegs:    <input type='text' name='numlegs'><br>";
        echo"NumDrawers: <input type='text' name='numdrawers'><br>";
        echo"Material:   <input type='text' name='material'><br>";
        echo"Square Feet:<input type='text' name='squarefeet'><br>";
        echo"Color:      <input type='text' name='color'><br>";
        echo"Submit:     <input type='text' name='desksub' value='ADD'><br>";
         break;
    case 'LAPTOP':
       echo"SerialNum:<input type='text' name='serialnumber'><br>";
        echo"Price($):    <input type='text' name='price'><br>";
        echo"Company:  <input type='text' name='company'><br>";
        echo"LaptopID:  <input type='text' name='laptopid'><br>";
        echo"Model:     <input type='text' name='model'><br>";
        echo"Processor: <input type='text' name='processor'><br>";
        echo"HDD:       <input type='text' name='hdd'><br>";
        echo"RAM:       <input type='text' name='ram'><br>";
        echo"Year:      <input type='text' name='year'><br>";
        echo"ScreenSize:<input type='text' name='screensize'><br>";
        echo"Color:     <input type='text' name='color'><br>";
        echo"Submit:    <input type='submit' name='laptopsub' value='ADD'><br>";
         break;
    case 'OTHER':
        echo"SerialNum:<input type='text' name='serialnumber'><br>";
        echo"Price($):    <input type='text' name='price'><br>";
        echo"Company:  <input type='text' name='company'><br>";
        echo"Name:  <input type='text' name='name'><br>";
        echo"OtherID:    <input type='text' name='otherid'><br>";
        echo"Description:<input type='text' name='description'><br>";
        echo"Submit:     <input type='submit' name='othersub' value='ADD'><br>";
         break;
    default: echo'NO TABLE SELECTED.'; break;   
    }
    $dbs->close();
    ?>
    
    
</form>

    </body></html>


