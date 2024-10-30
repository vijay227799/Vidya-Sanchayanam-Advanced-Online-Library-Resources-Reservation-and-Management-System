<?php
session_start();

error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
{
    header('location:index.php');
    exit;
}
else{ 
    // Get the book ID from the form submission
    if(isset($_POST['message'])) {
    $time = date('Y-m-d H:i:s');
    $Message = $_POST['message'];
    $student_id=$_SESSION['stdid'];//Obtained from dashboard.php-an essential thing which is stored in SESSION varaible very important for viewing pages concerned to single user.But this variable should be present in initial webpages if there are many webpages.
    $email='admin@gmail.com';

    // Insert the book ID and student ID into the desired table
    $sql = "INSERT INTO FEEDBACK (StudentId,Message,Time,Recipient) VALUES (:student_id,:message,:time,:email)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':student_id', $student_id);
    $query->bindParam(':message', $Message);
    $query->bindParam(':time', $time);
    $query->bindParam(':email', $email);

    // Check if the query was successful
    if ($query->execute()) {
        // Redirect back to the original page with a success message
        ?>
        <script>
            alert("Feedback submitted successfully!");
        </script>
        <?php
       // header('Location: Feedback.php'); This should not be included here as it will cause infinite refreshing of webpages
        
    } else {
        // Display an error message
        ?>
        <script>
            alert("Error submitting feedback. Please try again later.");
        </script>
        <?php
    }
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Feedback</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .form-container {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Feedback</h4>
                </div>
            </div>

            

            <div class="row form-container">
                <div class="col-md-6">
                    <h3>Any More Queries?</h3>
                    <form action="Feedback.php" method="post">
                        <div class="form-group">
                            <label for="suggestions">Write your Queries here</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>



