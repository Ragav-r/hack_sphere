<?php
// Assuming you've set up a local MySQL database
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "priyanka"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['email'];
$password = $_POST['password'];

// SQL to insert data into the database
$sql = "INSERT INTO facultylogin (email, password) VALUES ('$username', '$password')";

// Check if the insertion was successful
if ($conn->query($sql) === TRUE) {
  // Data inserted successfully, redirect to department.html
  header("Location: dash.html");
} else {
  // Error inserting data, redirect back to the login page
  header("Location: login.html");
}

$conn->close();
?>
