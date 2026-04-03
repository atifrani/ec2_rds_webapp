<!DOCTYPE html>
 <head>  <title>Enter bookid to display data - creating a simple web application</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style>
li {list-style: none;}
</style>
</head>
<body>
<h2>Enter Employee ID and enter</h2>
<ul>
<form name="find" action="find.php" method="POST" >
<li>Employee ID:</li><li><input type="text" name="id" /></li>
<li><input type="submit" name="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
$db = pg_connect("host=database-1.cwzeerf2ugo3.eu-west-1.rds.amazonaws.com port=5432 dbname=postgres user=postrges password=admin_12345");
$query = "select * from employee where id = '$_POST[id]'";
$result = pg_query($db, $query);
if (!$result)
{
echo "Please enter an existing employee id!!";
} else
{
while ($row = pg_fetch_assoc($result)){
echo "<tr>";
echo "<td> Employee ID: ",$row[id], "</td>";
echo "<br>";
echo "<td>Employee FirstName: ",$row[fname], "</td>";
echo "<br>";
echo "<td>Employee LastName: ",$row[lname], "</td>";
echo "<br>";
echo "<td>Employee Gender: ",$row[gender], "</td>";
echo "<br>";
echo "<td>Employee Age: ",$row[age], "</td>";
echo "<br>";
echo "<td>Employee Location: ",$row[location], "</td>";
echo "<br>";
echo "</tr>";
}
}
}
?>
