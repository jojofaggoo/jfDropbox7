<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>My Cloud Website</title>
</head>
<body>
<h1>Welcome to My Cloud!</h1>
<p>CISS301 Operating Systems and Cloud Computing</p>
<p>Instructor: Prof. Alfred Basta</p>
<p>Dropbox Assignment 7</p>
<p>Joe Fague</p>
<br><br><br><br>  
<form action = "" method ="post">
Your name:
<br>
<input type="text" name = "name" size="30" maxlength = "30">
<br>
<input type="submit" name = "submit" value="Submit">
<input type="submit" name = "view" value = "View All">
</form>
<?php
//replace the user and password with your credentials
$host = "jfsecondserverfordropbox7.mysql.database.azure.com";
$user = "ljfague1";
$password = "Unity916";
$db = "visitordb";
// connect to the database
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $user, $password, $db);
$display = "<p>No visitors found.</p>";
// Initialize the display variable

if (isset($_POST['submit'])) {
$yourName = $_POST['name'];
//sql statement
$query = "INSERT INTO visitor (visitorName) VALUES ('$yourName')";
if (mysqli_query($conn, $query)) {
echo "<p>Hi, $yourName, welcome to my cloud.</p>";
} else {
echo "<p>Hi, $yourName, please try again. </p>";
}
}
//if the View all button is clicked
if (isset($_POST['view'])) {
$query = "SELECT * FROM visitor";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
$display = "<h2>All Visitors </h2>";
while ($row = mysqli_fetch_assoc($result)) {
$display .= "Name: " . $row["visitorName"] . "<br>";
$display .= "Date Time: " . $row["visitTime"] . "<br>";
}
} else {
$display .= "<p>No visitors found.</p>"; // Add a message if no visitors are found
}
}
echo $display;
//close connection 
mysqli_close($conn);
?>
</body>
</html>

