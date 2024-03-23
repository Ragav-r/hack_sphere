<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teamName = $_POST['teamName'];
    $department = $_POST['department'];
    $teamLeaderName = $_POST['teamLeaderName'];
    $teamLeaderRollNumber = $_POST['teamLeaderRollNumber'];
    $teamLeaderEmail = $_POST['teamLeaderEmail'];
    $teamLeaderMobile = $_POST['teamLeaderMobile'];
    $member2Name = $_POST['member2Name'];
    $member2RollNumber = $_POST['member2RollNumber'];
    $member2Email = $_POST['member2Email'];
    $member2Mobile = $_POST['member2Mobile'];
    $member3Name = $_POST['member3Name'];
    $member3RollNumber = $_POST['member3RollNumber'];
    $member3Email = $_POST['member3Email'];
    $member3Mobile = $_POST['member3Mobile'];

    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "ra"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data
    $sql = "INSERT INTO rg (team_name, department, team_leader_name, team_leader_roll_number, team_leader_email, team_leader_mobile, member2_name, member2_roll_number, member2_email, member2_mobile, member3_name, member3_roll_number, member3_email, member3_mobile)
            VALUES ('$teamName', '$department', '$teamLeaderName', '$teamLeaderRollNumber', '$teamLeaderEmail', '$teamLeaderMobile', '$member2Name', '$member2RollNumber', '$member2Email', '$member2Mobile', '$member3Name', '$member3RollNumber', '$member3Email', '$member3Mobile')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a thank you page if insertion is successful
        header("Location: thanksforregistration.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
