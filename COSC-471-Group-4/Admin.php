<?php
session_start();
echo "<!DOCTYPE html>
<html> <head>
        <title>Admin Page</title>
    </head>
        <h1>Admin Page</h1>
    <body>";

if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } 
//connect to db:
 $user = 'root';
        $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
                
        
		
		//here are the a href tags to add items to the tables:
		//if these links dont work, please let me know. this is the file struture on my machine, and i can adjust accordingly.
		//also, this 'AdminAddTo.php' may not be added yet to the website yet.
		//pass user and password to AdminAddTo.php so we can navigate back from it and maintain login status.
        //localhost/COSC-471-Group-4/COSC-471-Group-4/
        //strt is the start of every href and each href has its own ending string. the middle is filled with the column value of the row. see BOOK table below:
        $strt = "<a href='AdminAddTo.php?id=";
        $bookEnd = "&table=BOOK'>ADD</a>";
        $chairEnd= "&table=CHAIR'>ADD</a>";
        $deskEnd = "&table=DESK'>ADD</a>";
        $laptopEnd="&table=LAPTOP'>ADD</a>";
        $otherEnd ="&table=OTHER'>ADD</a>";
		
        
        //echo all tables and the ability to add new instances of the item to the tables.  
        //ADD button will take data to another page that will use sql to add items to the table:
        //WORKS WITH TABLE NAMED 'USER' DOESNT NEED TO BE CALLED 'USERR'
        //THE A HREFS WILL TAKE USER TO ALTERNATE PAGE THAT ONLY PROCESSES 
        //THE ADDITION OF NEW ITEMS INTO THE TABLES.
        $sql = 'select * from BOOK;';
        $result = $dbs->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border= '1'><tr><th>ISBN</th><th>AUTHOR</th><th>TITLE</th><th>EDITION</th><th>RATING</th><th>GENRE</th><th>PUBLISHER</th><th>ADD</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ISBN"]."</td><td>".$row["Author"]."</td><td>".$row["Title"]."</td><td>".
                        $row["Edition"]."</td><td>".$row["Rating"]."</td><td>".$row["Genre"]."</td><td>".$row["Publisher"]."</td><td>".$strt.$row['ISBN'].$bookEnd."</td></tr>";
            }
            echo "</table>";
        }
        echo"<br>";
        //FROM TABLE CHAIR:
        $sql = 'select * from CHAIR;';
        $result = $dbs->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ChairID</th><th>NUM LEGS</th><th>NUM WHEELS</th><th>MATERIAL</th><th>COLOR</th><th>ADD</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Chair_id"]."</td><td>".$row["Num_of_legs"]."</td><td>".$row["Num_of_wheels"]."</td><td>".
                        $row["Material"]."</td><td>".$row["Color"]."</td><td>".$strt.$row['Chair_id'].$chairEnd."</td></tr>";
            }
            echo "</table>";
        }
        echo"<br>";
        //FROM TABLE DESK:
        $sql = 'select * from DESK;';
        $result = $dbs->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>DeskID</th><th>NUM LEGS</th><th>NUM DRAWERS</th><th>MATERIAL</th><th>SQRFT</th><th>COLOR</th><th>ADD</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Desk_id"]."</td><td>".$row["Num_of_legs"]."</td><td>".$row["Num_of_drawers"]."</td><td>".
                        $row["Material"]."</td><td>".$row["Square_ft"]."</td><td>".$row["Color"]."</td><td>".$strt.$row['Desk_id'].$deskEnd."</td></tr>";
            }
            echo "</table>";
        }
        echo"<br>";
        //FROM TABLE LAPTOP:
        $sql = 'select * from LAPTOP;';
        $result = $dbs->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>LaptopID</th><th>MODEL</th><th>PROCESSOR</th><th>HDD(GB)</th><th>RAM(GB)</th><th>YEAR</th><th>SCREEN SIZE</th><th>COLOR</th><th>ADD</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Laptop_id"]."</td><td>".$row["Model"]."</td><td>".$row["Processor"]."</td><td>".
                        $row["HD_size"]."</td><td>".$row["RAM_size"]."</td><td>".$row["Year"].
                        "</td><td>"."</td><td>".$row["Screen_size"]."</td><td>".$row["Color"]."</td><td>".$strt.$row['Laptop_id'].$laptopEnd."</td></tr>";
            }
            echo "</table>";
        }
        echo"<br>";
        //FROM TABLE OTHER:
        $sql = 'select * from OTHERS;';
        $result = $dbs->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>OTHERID</th><th>DESCRIPTION</th><th>ADD</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Others_id"].$row["Description"]."</td><td>".$strt.$row['Others_id'].$otherEnd."</td></tr>";
            }
            echo "</table>";
        }
        $dbs->close();
        ?>
        </body></html>