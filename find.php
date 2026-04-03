<!DOCTYPE html>
<html>
<head>
    <title>Find employee by ID</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        li { list-style: none; }
    </style>
</head>
<body>
    <h2>Enter Employee ID and press submit</h2>

    <form name="find" action="" method="POST">
        <ul>
            <li>Employee ID:</li>
            <li><input type="text" name="id" /></li>
            <li><input type="submit" name="submit" value="Search" /></li>
        </ul>
    </form>

<?php
if (isset($_POST['submit'])) {

    $db = pg_connect("host=endpoint port=5432 dbname=postgres user=postgres password=password");

    if (!$db) {
        die("Database connection failed.");
    }

    $query = "SELECT * FROM employee WHERE id = $1";
    $result = pg_query_params($db, $query, array($_POST['id']));

    if (!$result) {
        echo "<p>Query failed.</p>";
    } else {
        if (pg_num_rows($result) == 0) {
            echo "<p>Please enter an existing employee id.</p>";
        } else {
            while ($row = pg_fetch_assoc($result)) {
                echo "<p><strong>Employee ID:</strong> " . htmlspecialchars($row['id']) . "</p>";
                echo "<p><strong>Employee FirstName:</strong> " . htmlspecialchars($row['fname']) . "</p>";
                echo "<p><strong>Employee LastName:</strong> " . htmlspecialchars($row['lname']) . "</p>";
                echo "<p><strong>Employee Gender:</strong> " . htmlspecialchars($row['gender']) . "</p>";
                echo "<p><strong>Employee Age:</strong> " . htmlspecialchars($row['age']) . "</p>";
                echo "<p><strong>Employee Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
            }
        }
    }

    pg_close($db);
}
?>

</body>
</html>
