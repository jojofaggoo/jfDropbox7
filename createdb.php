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

// Connect to the database

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $user, $password, $db)
// Drop the table if it exists
$dropQuery = "DROP TABLE IF EXISTS visitor;";
mysqli_query($conn, $dropQuery)

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
