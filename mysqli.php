<h1>MySQLi Example</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "rootpaswoord";
$dbname = "sakila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//define and execute query
$sql = "select * from actor";
$result = $conn->query($sql);

print "<table>";
//show result (if there is any)
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        print "<tr>";
        print "<td>".$row["first_name"]."</td>";
        print "<td>".$row["last_name"]."</td>";
        print "</tr>";
    }
}
else
{
    echo "No records found";
}
print "</table>";
$conn->close();
?>
