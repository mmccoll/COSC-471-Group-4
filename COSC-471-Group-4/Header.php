<?php
$username = $_SESSION["username"];
$isAdmin = $_SESSION["isAdmin"];

// building the html
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
        <div id="header" >
        
            <div><img src="Images\Logo.png"></img>
            <table align="right">
                <tr><td><a href="UserProfile.html">hello ';
$php .= $username;
$php .= '</a></td><td><a href="Index.php">Sign out</a></td></tr></table> 
            <table align="center" id="links">
                <tr>';
if ($isAdmin)
{
    $php .= '<td><a >Orders</a>&nbsp;&nbsp;</td>
             <td><a >Inventory</a>&nbsp;&nbsp;</td>';
}
else
{
    $php .= '<td><a href="Home.php">Home</a>&nbsp;&nbsp;</td>
             <td><a href="Cart.php">Cart</a>&nbsp;&nbsp;</td>';
}
                    
    $php .=    '</tr>
            </table>
        </div>
	</header>
</html>';
echo $php;
?>
