<?php
$username = $_SESSION["username"];

$php = '<html>
    <style>
        #header, #links
        {
            background-color: darkcyan;
            color: white;
            font-size: xx-large;
        }
        img
        {
            align: left;
            width: 100px;
            height: 100px;
            padding: 5px;
        }
    </style>
	<header>
        <div id="header">
            <div><img src="Images\Logo.png"></img>
            <div align="right"><a href="Jingjing Zhou/UserProfile.html">hello ' . $username;
$php .= '</a></div> 
            <table align="center" id="links">
                <tr>
                    <td><a href="Home.php">Home</a>&nbsp;&nbsp;</td>
                    <td><a href="Cart.php">Cart</a>&nbsp;&nbsp;</td>
                </tr>
            </table>
        </div>
	</header>
</html>';
echo $php;
?>
