<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Request Books</title>
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
                    <h4 class="header-line">Request Page</h4>
                </div>
            </div>
            <div class="row">
                <?php if($_SESSION['error']!="") { ?>
                <div class="col-md-6">
                </div>
                <?php } ?>
                <?php if($_SESSION['msg']!="") { ?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong>Success :</strong> 
                        <?php echo htmlentities($_SESSION['msg']);?>
                        <?php echo htmlentities($_SESSION['msg']="");?>
                    </div>
                </div>
                <?php } ?>

                <?php if($_SESSION['delmsg']!="") { ?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong>Success :</strong> 
                        <?php echo htmlentities($_SESSION['delmsg']);?>
                        <?php echo htmlentities($_SESSION['delmsg']="");?>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Request Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>StudentId</th>
                                            <th>ISBNNumber</th>
                                            <th>Status</th>
                                            <th>RequestDate</th>
                                            <th>BookId</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM request WHERE status = 1";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $status = $row['Status'];
                                            $student_id = $row['StudentId'];
                                            $isbn_number = $row['ISBNNumber'];
                                            $request_date = $row['RequestDate'];
                                            $book_id = $row['BookId'];
                                        ?>
                                        <tr>
                                            <td><?php echo $student_id;?></td>
                                            <td><?php echo $isbn_number;?></td>
                                            <td><?php echo $status;?></td>
                                            <td><?php echo $request_date;?></td>
                                            <td><?php echo $book_id;?></td>
                                            <td>
                                                <button onclick="fillForm('<?php echo $student_id;?>', '<?php echo $isbn_number;?>', '<?php echo $book_id;?>', '<?php echo $status;?>')">Accept</button>
                                                <button onclick="declineRequest('<?php echo $student_id;?>', '<?php echo $isbn_number;?>', '<?php echo $book_id;?>')">Decline</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>

                                <script>
                                    function fillForm(studentId, isbnNumber, bookId, status) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST", "updateBookQuantity.php", true);
                                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                if (xhr.responseText === "success") {
                                                    var form = document.createElement("form");
                                                    form.action = "RequestIssue.php";
                                                    form.method = "post";
                                                    form.target = "_blank"; 

                                                    var statusInput = document.createElement("input");
                                                    statusInput.type = "hidden";
                                                    statusInput.name = "status";
                                                    statusInput.value = status;
                                                    form.appendChild(statusInput);

                                                    var bookIdInput = document.createElement("input");
                                                    bookIdInput.type = "hidden";
                                                    bookIdInput.name = "book_id";
                                                    bookIdInput.value = bookId;
                                                    form.appendChild(bookIdInput);

                                                    var studentIdInput = document.createElement("input");
                                                    studentIdInput.type = "hidden";
                                                    studentIdInput.name = "student_id";
                                                    studentIdInput.value = studentId;
                                                    form.appendChild(studentIdInput);

                                                    var isbnNumberInput = document.createElement("input");
                                                    isbnNumberInput.type = "hidden";
                                                    isbnNumberInput.name = "isbn_number";
                                                    isbnNumberInput.value = isbnNumber;
                                                    form.appendChild(isbnNumberInput);

                                                    document.body.appendChild(form);
                                                    form.submit();
                                                } else {
                                                    alert(xhr.responseText);
                                                }
                                            }
                                        };
                                        xhr.send("isbn_number=" + isbnNumber + "&book_id=" + bookId + "&student_id=" + studentId);
                                    }
                                </script>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
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
<?php }?>