<?php
session_start();
//check which table we are adding to here:
$var="";
if (isset($_GET['booksub'])){
    $var='book'; }
else if(isset($_GET['chairsub'])){
    $var='chair';}
else if(isset($_GET['desksub'])){
    $var='desk';}
else if(isset($_GET['laptopsub'])){
    $var='laptop';}
else if(isset($_GET['othersub'])){
    $var='other';
} else {
    echo 'NO TABLE SELECTED.';
}
$var1; $var2; $var3; $var4; $var5; $var6; $var7; $var8; $var9;
//connect to db:
$user = 'root';
$password = '';
$db = 'BOOKSTORE';
$dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
//INSERTION query:
//FOR THE BOOK, THE PRIMARY/FORIEGN KEY IS THE ISBN; CAN ADJUST LATTER IF NEEDED:
$bool1=false;
$bool2=false;
switch($var){
    case 'book':
        //insert into item table:
        $sql = 'insert into item values("'.$_GET['title'].'", '.$_GET['isbn'].', '.$_GET['price'].', "'.$_GET['publisher'].'");';
        if($dbs->query($sql)){ $bool1=true;}
        echo $sql.", ";
        //insert into book table;
        $sql = 'insert into BOOK values("'.$_GET['isbn'].'", "'.$_GET['author'].'", "'.$_GET['title'].'", '.$_GET['edition'].', '.$_GET['rating'].
                ', "'.$_GET['genre'].'", "'.$_GET['publisher'].'" );';
        if($dbs->query($sql)){$bool2=true;}
        echo $sql;
        break;
    case 'chair':
        //insert into item table:
        $sql = 'insert into item values("'.$_GET['name'].'", '.$_GET['chairid'].', '.$_GET['price'].', "'.$_GET['company'].'");';
         if($dbs->query($sql)){ $bool1=true;}
        echo $sql." ";
        //insert into book table;
        $sql = 'insert into CHAIR values('.$_GET['chairid'].', '.$_GET['numlegs'].', '.$_GET['numwheels'].', "'.$_GET['material'].'", "'.$_GET['color'].'" );';
        if($dbs->query($sql)){$bool2=true;}
        echo $sql;
        break;
    case 'laptop':
         //insert into item table:
        $sql = 'insert into item values("'.$_GET['model'].'", '.$_GET['laptopid'].', '.$_GET['price'].', "'.$_GET['company'].'");';
         if($dbs->query($sql)){ $bool1=true;}
        echo $sql." ";
        //insert into book table;
        $sql = 'insert into LAPTOP values('.$_GET['laptopid'].', "'.$_GET['model'].'", "'.$_GET['processor'].'", '.$_GET['hdd'].', '.$_GET['ram'].
                ', "'.$_GET['year'].'", '.$_GET['screensize'].', "'.$_GET['color'].'" );';
        if($dbs->query($sql)){$bool2=true;}
        echo $sql;
        break;
    case 'desk':
        $sql = 'insert into item values("'.$_GET['name'].'", '.$_GET['deskid'].', '.$_GET['price'].', "'.$_GET['company'].'");';
         if($dbs->query($sql)){ $bool1=true;}
        echo $sql." ";
        //insert into book table;
        $sql = 'insert into DESK values('.$_GET['deskid'].', "'.$_GET['numlegs'].'", "'.$_GET['numdrawers'].'", '.$_GET['material'].', '.$_GET['squarefeet'].
                ', "'.$_GET['color'].'" );';
        if($dbs->query($sql)){$bool2=true;}
        echo $sql;
        break;
     case 'desk':
        $sql = 'insert into item values("'.$_GET['name'].'", '.$_GET['otherid'].', '.$_GET['price'].', "'.$_GET['company'].'");';
         if($dbs->query($sql)){ $bool1=true;}
        echo $sql." ";
        //insert into book table;
        $sql = 'insert into OTHERS values('.$_GET['otherid'].', "'.$_GET['description'].'"); ';
        if($dbs->query($sql)){$bool2=true;}
        echo $sql;
        break;
    default: echo"NO TABLE SELECTED.";
        break;
}
if($bool1 && $bool2){
    $_SESSION['error'] ="Added to table.";
    Header("Location: Admin.php");
} else{
    $_SESSION['error'] ="Unable to add to table.";
    Header("Location: Admin.php");
}
//once querys executed, return to Admin.php page with message from session variables:
