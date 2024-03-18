<!DOCTYPE html>
<html>
<title>Univerzita</title>
<body>
    <ul>
    <li><a href='xml/fakulta-nostyle.xml'>Fakulta (no style)</a></li>
    <li><a href='xml/fakulta.xml'>Fakulta (XSL)</a></li>
</ul>

<?php
$servername = "4_hodina-database-1"; // Replace with your actual database server name
$username = "admin";
$password = "heslo";
$dbname = "univerzita";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfully";
}

// Close connection
$conn->close();
?>
</body>

</html>