<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST["student_id"];
    $message = $_POST["message"];

    // Get the chat ID for the student
    $query = "SELECT id FROM userchat WHERE chat_owner = $studentId";
    $result = mysqli_query($conn, $query);
    $chatId = mysqli_fetch_assoc($result)["id"];

    // Insert a new message into the userchat_msg table
    $query = "INSERT INTO userchat_msg (chat_id, msg_owner, sender, recipient, msg_date, msg_status, msg_text) VALUES ($chatId, $studentId, 111, $studentId, UNIX_TIMESTAMP(), 0, '$message')";
    mysqli_query($conn, $query);

    // Retrieve the message from the userchat_msg table
    $query = "SELECT msg_text FROM userchat_msg WHERE chat_id = $chatId AND msg_owner = $studentId ORDER BY msg_date DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $messageText = $row["msg_text"];

    // Display the message
    echo "<p>Message: $messageText</p>";
}

$conn->close();
?>