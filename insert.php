<!DOCTYPE html>
<html>
<head>
<title>Insert data to PostgreSQL with PHP</title>
<meta charset="utf-8" />
<style>
li { list-style: none; }
</style>
</head>
<body>

<h2>Enter information regarding new employee</h2>

<form name="insert" action="" method="POST">
<ul>
<li>Employee ID:</li><li><input type="text" name="id" /></li>
<li>Employee FirstName:</li><li><input type="text" name="fname" /></li>
<li>Employee LastName:</li><li><input type="text" name="lname" /></li>
<li>Employee Gender:</li><li><input type="text" name="gender" /></li>
<li>Employee Age:</li><li><input type="text" name="age" /></li>
<li>Employee Location:</li><li><input type="text" name="location" /></li>
<li><input type="submit" name="submit" /></li>
</ul>
</form>

<?php
if (isset($_POST['submit'])) {

    $db = pg_connect("host=database-1.cwzeerf2ugo3.eu-west-1.rds.amazonaws.com port=5432 dbname=postgres user=postgres password=admin_12345");

    if (!$db) {
        die("Connection failed");
    }

    // Use parameterized query (SAFE)
    $query = "INSERT INTO employee (id, fname, lname, gender, age, location)
              VALUES ($1, $2, $3, $4, $5, $6)";

    $result = pg_query_params($db, $query, [
        $_POST['id'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['gender'],
        $_POST['age'],
        $_POST['location']
    ]);

    if ($result) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}
?>

</body>
</html>
