<!DOCTYPE html>
<head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
</head>
<body>
<h2>Enter information regarding new employee</h2>
<ul>
<form name="insert" action="insert.php" method="POST" >
<li>Employee ID:</li><li><input type="text" name="id" /></li>
<li>Employee FirstName:</li><li><input type="text" name="fname" /></li>
<li>Employee LastName:</li><li><input type="text" name="lname" /></li>
<li>Employee Gender:</li><li><input type="text" name="gender" /></li>
<li>Employee Age:</li><li><input type="text" name="age" /></li>
<li>Employee Location:</li><li><input type="text" name="location" /></li>
<li><input type="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=database-1.cwzeerf2ugo3.eu-west-1.rds.amazonaws.com port=5432 dbname=postgres user=postrges password=admin_12345");
$query = "INSERT INTO employee VALUES ('$_POST[id]','$_POST[fname]', '$_POST[lname]','$_POST[gender]','$_POST[age]', '$_POST[location]')";
$result = pg_query($query); 
?>
