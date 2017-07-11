<html>
<!--  
Name: Natasha Garcia
Course: CNT 4714 
Assignment title: A Three-Tier Distributed Web-Based Application Using PHP and Apache

-->
<body>
<head>
<title> Enter Query</title>
</head>	
<body style= "background-color:#999999;">

<center>
<b><h1 style="color: yellow;">CNT 4714- Project Four Database Client</h1></b><hr><p>
<?php
extract($_POST);

//connect to database
if ( !( $database = mysqli_connect( "localhost:3306", 
            "root", "root", "project4" ) ) )
	//if connection fails
   die("I'm sorry, we could not connect. Try again.");

?>

<table>
<tr>
<td valign="top"><center>
<font color="white">Welcome back 
<?php
 print(" <b>$name</b>      ");

?>
<form method="post" action="http://localhost/login.html" >
<input type="submit" value="Logout">
</form>

</td>
<td>
<br>
      <h2 style="color: yellow;">
         Enter Query
      </h2>
	<form action = "results.php"  style="color: white;" method = "post">
		Please enter a valid SQL query or update
		statement. You may also just press "Submit Query
		" to run a default query against the database<br><textarea name = "sqlcom"  id='output' cols="40" rows="5"></textarea>
		<br>
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="hidden" name="password" value="<?php echo $password; ?>">
		
<!-- submit buttons -->
	
		<input type = "submit" name="SubmitUpdate" value = "Submit Update" /></p>
		<input type = "submit" name="SubmitQuery" value = "Submit Query" />
		<input type="button" value="Reset" onclick="this.form.elements['sqlcom'].value=''">
	</form>

</td>
</tr>
</table>
<hr></hr>

</center>
</body>
</html>