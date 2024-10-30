<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['isbn_number']) && isset($_POST['book_id']) && isset($_POST['student_id'])) {
    $isbnNumber = $_POST['isbn_number'];
    $bookId = $_POST['book_id'];
    $studentId = $_POST['student_id'];

    $checkQuery = "SELECT Total_no_of_copies_Available FROM tblbooks WHERE ISBNNumber = '$isbnNumber'";
    $result = mysqli_query($conn, $checkQuery);
    $row = mysqli_fetch_assoc($result);

    if ($row['Total_no_of_copies_Available'] > 0) {
        $newQuantity = $row['Total_no_of_copies_Available'] - 1;
        $updateQuery = "UPDATE tblbooks SET Total_no_of_copies_Available = $newQuantity WHERE ISBNNumber = '$isbnNumber'";
        mysqli_query($conn, $updateQuery);

        // Update request status to 0
        $updateRequestQuery = "UPDATE request SET Status = 0 WHERE BookId = '$bookId' AND StudentId = '$studentId'";
        mysqli_query($conn, $updateRequestQuery);

        echo "success";
    } else {
        echo "Book not available";
    }
}
?>
