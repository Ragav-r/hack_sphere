<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $eventName = $_POST["eventName"];
    $venue = $_POST["venue"];
    $date = $_POST["date"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $recipientName = $_POST["recipientName"];
    $recipientPosition = $_POST["recipientPosition"];
    $recipientDepartment = $_POST["recipientDepartment"];
    $expectedAttendance = $_POST["expectedAttendance"];

    // Generate approval letter
    $approvalLetter = "
      <h2>Event Approval Letter</h2>
      <p>Dear $recipientName,</p>
      <p>Subject: Approval for $eventName on $date at $venue</p>
      <p>I am writing to formally approve the upcoming event titled \"$eventName\" scheduled to be held on $date at $venue. The event will commence from $startTime and conclude by $endTime.</p>
      <p>The primary objectives of the event include [briefly outline the objectives or goals of the event]. We have meticulously planned and organized every aspect of the event to ensure its success and impact.</p>
      <p>We kindly request your review and approval of this event. Your support and endorsement are crucial to its success, and we are confident that it will be a valuable opportunity for our college/institution.</p>
      <p>Thank you for considering our request. We look forward to your favorable response.</p>
      <p>Warm regards,</p>
      <p>[Your Name]</p>
      <p>[Your Position]</p>
      <p>[Your Contact Information]</p>
    ";

    // Send approval letter via email
    $to = "higherauthority@example.com"; // Change this to the higher authority's email address
    $subject = "Approval for $eventName on $date at $venue";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: yourcollege@example.com" . "\r\n"; // Change this to your college's email address or use a valid email address

    mail($to, $subject, $approvalLetter, $headers);

    // Redirect back to the form page with a success message
    header("Location: event_approval_form.php?status=success");
    exit;
} else {
    // Redirect back to the form page with an error message
    header("Location: event_approval_form.php?status=error");
    exit;
}
?>
