<!DOCTYPE html>
<html>
    <?php session_start();?>
    <?php include 'Header.php';?>

    <head>
    <title>User Profile</title>
    <style>
        div.container {
            width: 100%;
            border: 1px lightgray;
        }
        form{
            width: 320px;
            height:600px;
            margin-left: auto; 
            margin-right: auto; 
            padding: 70px;
            border: 1px lightgray;
            overflow: auto;
       }
        label{
            float:left;
            width: 150px;
            margin-left: auto; 
            margin-right: auto; 
            padding: 10px 5px; 
        }
        input{
            float:left;
            width: 300px;
            margin-left: auto; 
            margin-right: auto; 
            padding: 10px 5px; 
       }
    </style>
        <script type=text/javascript>
            function onLoadFun(){
                //get username
                //var url=location.search,obj={};
                //var username;
                //if(url.indexOf("?")!=-1){
                //    var str = url.substr(1);
                //    var strs= str.split("&");
                //    for(var i=0;i<strs.length;i++){
                //        obj[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
                //    }
                //}
                //username = obj.name;
                var username="<?php echo $_SESSION['username'];?>";
                document.getElementById('in_username').value=username;
                document.getElementById('label_UserName').innerHTML = "Username:  "+username;

                //get current data from user
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                        var user_info=document.getElementById("txtHint").innerHTML.split(";");
                       //set current email
                        document.getElementById('label_email').innerHTML = "Email:  "+user_info[2];
                      //set current customer name
                        document.getElementById('label_CustomerName').innerHTML = "Customer Name:  "+user_info[0];
                      //set current customer address
                        document.getElementById('label_Address').innerHTML = "Customer Address:  "+user_info[1];
                   }
                };
                xmlhttp.open("GET","get_user.php?q="+username,true);
                xmlhttp.send();
           }
        </script>
   </head>
    <body onload="onLoadFun()">

        <div class="container">
            <form method="post" action="user_profile_action_page.php">

                <label for="Username" id="label_UserName"></label>
                <input type="text" name="username" id="in_username" style="visibility: hidden;"><br>

                <label for="currentPassword" >Current Password:</label>
                <input type="text" name="currentPassword" value="Key in your current password." onfocus="if (value==defaultValue)value=''" onblur="if(!value)value=defaultValue"><br>

                <label for="newPassword">New Password:</label>
                <input type="text" name="newPassword" value="Key in your new password." onfocus="if (value==defaultValue)value=''" onblur="if(!value)value=defaultValue"><br>

                <label for="Email" id="label_email"></label>
                <input type="text" name="email" value="Key in your new email." onfocus="if (value==defaultValue)value=''" onblur="if(!value)value=defaultValue"><br>

                <label for="CustomerName" id="label_CustomerName"></label>
                <input type="text" name="customernName" value="Key in your new name." onfocus="if (value==defaultValue)value=''" onblur="if(!value)value=defaultValue"><br>

                <label for="Address" id="label_Address"></label>
                <input type="text" name="address" value="Key in your new address." onfocus="if (value==defaultValue)value=''" onblur="if(!value)value=defaultValue"><br>

                <br>
                <input type="submit" value="Update Profile" style="width: 100px; margin-top: 30px;margin-left: 210px;">
            </form>

        </div>
        <p id="txtHint" style="visibility: hidden;"></p>
    </body>
</html>
