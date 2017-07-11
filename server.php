<!DOCTYPE html>
<!--  
Name: Natasha Garcia
Course: CNT 4714 
Assignment title: A Three-Tier Distributed Web-Based Application Using PHP and Apache

-->
<html lang="en">
<!-- server.php
Program to display $_SERVER variables -->


<head>
    <title>SERVER Variables Display</title>
</head>


<body style = "font-family: arial, sans-serif; 
      background-color: #999999;">
    <table border = "0" cellpadding = "2" cellspacing = "0"
         width = "100%">

		<?php
          // key and value for each element 
          foreach ( $_SERVER as $key => $value ) 
             print( "<tr><td bgcolor = \"#11bbff\">
                 <strong>$key</strong></td>
                 <td>$value</td></tr>" );
		?>
</table>  
</body>
</html>