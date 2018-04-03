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
            <div>
                <div><img src="Images\Logo.png"></img>
            </div>
            <div>
            <table align="center" id="links">
                <tr>
                    <td><a href="Home.php">Home&nbsp;&nbsp;</a></td>
                    <td><a>Cart&nbsp;&nbsp;</a></td>
                    <td><a>Account&nbsp;&nbsp;</a></td>
                </tr>
            </table>
            <p>hello</p>
            </div>
        </div>
	</header>
</html>';

/*$php = '<html>
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
            <div align="right"><p>hello ' . $username;
$php .= '</p></div> 
            <table align="center" id="links">
                <tr>
                    <td><a href="Home.php">Home&nbsp;&nbsp;</a></td>
                    <td><a>Cart&nbsp;&nbsp;</a></td>
                    <td><a>Account&nbsp;&nbsp;</a></td>
                </tr>
            </table>
        </div>
	</header>
</html>';*/
echo $php;
?>
<style>
    
</style>
