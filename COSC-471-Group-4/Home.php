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
    $isAdmin = "false";
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
$_SESSION["isAdmin"] = false;
$row = $result->fetch_assoc();
if($row['Is_admin'] == 'true'){
    //if so, redirect to admin page:
    header("Location: Admin.php");
    // add isAdmin to session for Header.php
    $_SESSION["isAdmin"] = true;
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
        
			<h1 class=center>Home Page</h1>
		
		
			Pick a Category:
			<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' name='item_type' >
				<select name="Category">
					<option value="SELECT">Select...</option>
					<option name= "BOOK" value="BOOK">Books</option>
					<option name= "CHAIR" value="CHAIR">Chairs</option>
					<option name= "DESK" value="DESK">Desks</option>
					<option name= "LAPTOP" value="LAPTOP">Laptops</option>
					<option name= "OTHERS" value="OTHERS">Others</option>
				</select>
	
				<br />
	
				<input type='submit' value = 'Enter'>

			</form>
		
		
		<?php
		
		//connect to db:
		$user = 'root';
        $password = '';
        $db = 'BOOKSTORE';
        //connects to database:
        $dbs = new mysqli('localhost', $user, $password, $db) or die("Unable to connect with db.");
        
        //echo all tables and the ability to add new instances of the item to the tables.  
        //ADD button will take data to another page that will use sql to add items to the table:
			
		if ($_POST['value'] = "BOOK"){	
			$sql = 'select * from BOOK;';
			$result = $dbs->query($sql);
			if ($result->num_rows > 0) {
				echo "<table border= '1'><tr><th>ISBN</th><th>AUTHOR</th><th>EDITION</th><th>TITLE</th><th>RATING</th><th>GENRE</th><th>PUBLISHER</th><th>ADD</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["ISBN"]."</td><td>".$row["Author"]."</td><td>".$row["Title"]."</td><td>".
							$row["Edition"]."</td><td>".$row["Rating"]."</td><td>".$row["Genre"]."</td><td>".$row["Publisher"]."</td><td><a href='AddToCart.php?id=".$row["ISBN"]."&table=BOOK'>ADD</a></td></tr>";
				}
				echo "</table>";
			}
			echo"<br>";
		}
		
		if ($_POST['value'] = "CHAIR"){	
			//FROM CHAIR CHAIR:
			$sql = 'select * from CHAIR;';
			$result = $dbs->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>ChairID</th><th>NUM LEGS</th><th>NUM WHEELS</th><th>MATERIAL</th><th>COLOR</th><th>ADD</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["Chair_id"]."</td><td>".$row["Num_of_legs"]."</td><td>".$row["Num_of_wheels"]."</td><td>".
							$row["Material"]."</td><td>".$row["Color"]."</td><td><a href='AddToCart.php?id=".$row["Chair_id"]."&table=CHAIR'>ADD</a></td></tr>";
				}
				echo "</table>";
			}
			echo"<br>";
		}
		
		if ($_POST['value'] = "DESK"){	
			//FROM DESK DESK:
			$sql = 'select * from DESK;';
			$result = $dbs->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>DeskID</th><th>NUM LEGS</th><th>NUM DRAWERS</th><th>MATERIAL</th><th>SQRFT</th><th>COLOR</th><th>ADD</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["Desk_id"]."</td><td>".$row["Num_of_legs"]."</td><td>".$row["Num_of_drawers"]."</td><td>".
							$row["Material"]."</td><td>".$row["Square_ft"]."</td><td>".$row["Color"]."</td><td><a href='AddToCart.php?id=".$row["Desk_id"]."&table=DESK'>ADD</a></td></tr>";
				}
				echo "</table>";
			}
			echo"<br>";
		}
		
		if ($_POST['value'] = "LAPTOP"){	
			//FROM DESK LAPTOP:
			$sql = 'select * from LAPTOP;';
			$result = $dbs->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>LaptopID</th><th>MODEL</th><th>PROCESSOR</th><th>HDD(GB)</th><th>RAM(GB)</th><th>YEAR</th><th>SCREEN SIZE</th><th>COLOR</th><th>ADD</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["Laptop_id"]."</td><td>".$row["Model"]."</td><td>".$row["Processor"]."</td><td>".
							$row["HD_size"]."</td><td>".$row["RAM_size"]."</td><td>".$row["Year"].
							"</td><td>"."</td><td>".$row["Screen_size"]."</td><td>".$row["Color"]."</td><td><a href='AddToCart.php?id=".$row["Laptop_id"]."&table=LAPTOP'>ADD</a></td></tr>";
				}
				echo "</table>";
			}
			echo"<br>";
		}
		
		if ($_POST['value'] = "OTHERS"){	
			//FROM DESK OTHER:
			$sql = 'select * from OTHERS;';
			$result = $dbs->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>OTHERID</th><th>DESCRIPTION</th><th>ADD</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["Others_id"].$row["Description"]."</td><td><a href='AddToCart.php?id=".$row["Others_id"]."&table=OTHERS'>ADD</a></td></tr>";
				}
				echo "</table>";
			}
		}
		
		else{
			echo "Select a category";
		}
        
        echo'</body></html>';
        

		?>
		
		
		
    </body>
    <?php
    include 'Footer.php';
    ?>
</html>
