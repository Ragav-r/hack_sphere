<?php
// Assuming you've set up a local MySQL database
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "hr"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name= $_POST['name'];
$email= $_POST['email'];
$password = $_POST['pwd1'];
$cpassord=$_POST['pwd2']

// SQL to insert data into the database
$sql = "INSERT INTO facultylogin (name,email, pwd1,pwd2) VALUES ('$name','$email','$pwd1', '$pwd2')";

// Check if the insertion was successful
if ($conn->query($sql) === TRUE) {
  // Data inserted successfully, redirect to department.html
  header("Location: login.html");
} else {
  // Error inserting data, redirect back to the login page
  header("Location: login.html");
}

$conn->close();
?>
