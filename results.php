<html>
<!--  
Name: Natasha Garcia
Course: CNT 4714 
Assignment title: A Three-Tier Distributed Web-Based Application Using PHP and Apache

-->

<body>
<head>
<title>Results</title>
</head>	
<body style= "background-color:#999999;">

<center>
<b><h1 style="color: yellow;">CNT 4714- Project Four Database Client</h1></b><hr>
<p>
<?php
extract($_POST);
$query = $sqlcom;

//connect to database
if( !($database = mysqli_connect("localhost:3306","root","root","project4"))){

	die("Sorry, results are not shown. Try again.");
	}
?>

<table>
<tr>
<td valign="top"><center>
<font color="white">Welcome back </font>
<br></br>
<?php
 print(" <b>$name</b>      ");

?>
<form method="post" action="query.php" >
<input type="submit" value="logout">
</form>

</td>
<td>
<br>

<!--results table -->
<table cellpadding="4" 
cellspacing="0" style="border: 2px solid #eeeeee;">
<?php

if($query==""){
$query = "SELECT * FROM suppliers";
}
	
if ($SubmitQuery)
{	
if( !($result = mysqli_query($database,$query))){
print("<h1>Major Error:</h1>");
print("A SQLException occured while interaction with the supplier/parts/jobs/shipment database.<br>The error message was<br>");
die(mysqli_error($database));

};
print("Here are your results:</h2>");
$metadata = mysqli_fetch_fields($result);
print("<tr>");
for($i=0; $i<count($metadata);$i++){
	print("<td bgcolor = lightyellow>");
	printf("<b>%s</b>",$metadata[$i]->name);
	print("</br></td>");
}
print("</tr>");


for($counter = 0; $row = mysqli_fetch_row($result); $counter++){
	print("<tr>");
	foreach($row as $key => $value)
		print("<td>$value</td>");
	print("</tr>");
}
mysqli_close($database);
}
else{

if( !($result = mysqli_query($database,$query))){
die(mysqli_error($database));

}


list($one,$two,$three,$four,$five,$six,$seven)=explode('\'',$query);

list($one1,$two1)=explode(',',$seven);
list($one12,$two12)=explode(')',$two1);
echo $one12;

//alert 

if($one12 > 100){
echo '  <SCRIPT LANGUAGE="JavaScript1.1">window.alert(

  "ALERT: SUPPLIER STATUS HAS CHANGED DUE TO BUSINESS LOGIC. DISPLAYING UPDATED SUPPLIER TABLE!");

  </SCRIPT>';
$bquery = "select DISTINCT snum from shipments where quantity >= 100";

if( !($blogic = mysqli_query($database,$bquery))){
die(mysqli_error($database));

}


print("<h2>Insert Query Results:</h2>");


for($counter1 = 0; $row1 = mysqli_fetch_row($blogic); $counter1++){
	foreach($row1 as $key => $value){
		$update = "UPDATE suppliers SET status = status + 5 WHERE snum = \"$value\"";
		if( !($result = mysqli_query($database,$update))){
		die(mysqli_error($database));
		}
		
		}
}

//mysql fetch
$equery = "SELECT * FROM suppliers";
if( !($end = mysqli_query($database,$equery))){
die(mysqli_error($database));
}
print("<table>");
$metadata = mysqli_fetch_fields($end);
print("<tr>");
for($i=0; $i<count($metadata);$i++){
	print("<td bgcolor = lightyellow>");
	printf("<b>%s</b>",$metadata[$i]->name);
	print("</br></td>");
}
print("</tr>");


for($counter = 0; $row = mysqli_fetch_row($end); $counter++){
	print("<tr>");
	foreach($row as $key => $value)
		print("<td>$value</td>");
	print("</tr>");
}
print("</table>");
msqli_close($database);




}else{
$equery = "SELECT * FROM suppliers";
if( !($end = mysqli_query($database,$equery))){
die(mysqli_error($database));
}
print("<h2>Results:</h2>");
print("<table>");
$metadata = mysqli_fetch_fields($end);
print("<tr>");
for($i=0; $i<count($metadata);$i++){
	print("<td bgcolor = lightyellow>");
	printf("<b>%s</b>",$metadata[$i]->name);
	print("</br></td>");
}
print("</tr>");


for($counter = 0; $row = mysqli_fetch_row($end); $counter++){
	print("<tr>");
	foreach($row as $key => $value)
		print("<td>$value</td>");
	print("</tr>");
}
print("</table>");
msqli_close($database);
}
}
?>

</table>

<form method="post" action="query.php" >
<input type="submit" value="return to main page">
</td>
</tr>
</tr>
</td>
</table>
<hr></hr>
</body>
</html>