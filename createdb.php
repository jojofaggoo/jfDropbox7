<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create MySQL on Azure</title>
</head>
<body>
<?php 
// Replace the user and password with your credentials
$host = "jfsecondserverfordropbox7.mysql.database.azure.com";
$user = "ljfague1";
$password = "Unity916";
$db = "visitordb";
$servername = "jfsecondserverfordropbox7.mysql.database.azure.com";
// Connect to the database
$conn = new mysqli($servername, $username, $password);
$conn = mysqli_init();
if (!mysqli_real_connect($conn, $host, $user, $password, $db)) {
die("Connection failed: " . mysqli_connect_error());
}
// Drop the table if it exists
$dropQuery = "DROP TABLE IF EXISTS visitor;";
if (!mysqli_query($conn, $dropQuery)) {
echo "<p>Error dropping table: " . mysqli_error($conn) . "</p>";
}

$query = "CREATE TABLE visitor (
visitorid INTEGER AUTO_INCREMENT,
visitorName VARCHAR(100) NOT NULL,
visitTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(visitorid)
)";

if (mysqli_query($conn, $query)) {
echo "<p>Table Created.</p>";
} else {
echo "<p>Error creating table: " . mysqli_error($conn) . "</p>";
}

// Close connection
mysqli_close($conn);
?>
</body>
</html>
