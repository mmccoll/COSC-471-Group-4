<?php
    // define variables and set to defalt values
    $username =$currentPassword =$newPassword=$email =$customerName=$address="";
    //$flgUpdatePassword=$flgUpdateEmail=$flgUpdateCustomerName=$flgUpdateAddress=false;
    
    //get form values
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = test_input($_POST["username"]);
      $currentPassword = test_input($_POST["currentPassword"]);
      $newPassword = test_input($_POST["newPassword"]);
      $email = test_input($_POST["email"]);
      $customerName = test_input($_POST["customernName"]);
      $address = test_input($_POST["address"]);
      //validate and update database
      if($newPassword<>"Key in your new password."){
          if(validate_current_password($currentPassword,$username)==true)
            update_user_table("Password",$newPassword,$username);
      }
      if($email<>"Key in your new email.")
          update_user_table("Email",$email,$username);
      if($customerName<>"Key in your new name.")
          update_user_table("Name",$customerName,$username);
      if($address<>"Key in your new address.")
          update_user_table("Adress",$address,$username);
      //jump back to userprofile pages
       header("Location:UserProfile.html?name=".$username);
       exit;
    }
    
    //preprocess form datas
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    //before update password, validate current password
    function validate_current_password($currentPW,$userName){
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "BOOKSTORE";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "select Password from user WHERE username='".$userName."'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if($row["Password"]<>$currentPW){
           $conn->close();
            return false;
        }
        else{
           $conn->close();
           return true;
        }
     }
     
    function update_user_table($attribute,$value,$userName){
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $dbname = "BOOKSTORE";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "UPDATE user SET ".$attribute."='".$value."' WHERE username='".$userName."'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully".$sql;
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
     }
 ?>
