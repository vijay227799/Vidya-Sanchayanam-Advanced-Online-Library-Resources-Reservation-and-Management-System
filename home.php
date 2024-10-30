<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;600;700&display=swap" rel="stylesheet">
    <title>Online Library Management System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: gold;
            color: #333;
            padding-left: 0px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: lightblue;
            padding: 1rem 2rem;
            color: #fff;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .navbar .nav-links li a {
            color: #030303;
            text-decoration: none;
        }

        .hero-section {
            text-align: center;
            padding: 5rem 2rem;
            background-color: #939494;
            color: #ffff;
            margin-bottom: 40px;
            background-image: url("Librarybg.jpg");
            background-attachment: cover;
            font-style:italic;

        }

        .hero-section h1 {
            font-size: 3rem;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin: 1rem 0;
        }

        .hero-section .cta-button {
            padding: 1rem 2rem;
            background-color: #005bb5;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .hero-section .cta-button:hover {
            background-color: #004080;

        }

        .logo-container {
            background: #fdfeff;
            padding: 10px 0;
            height: 50px;
        }

        .logo-container img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
            float: left;
        }

        .hero {
            position: relative;
            height: 500px;
            overflow: hidden;
            color: #939494;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
        }

        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            animation: slide 15s infinite;
            opacity: 0;
        }

        .carousel img:nth-child(1) {
            animation-delay: 0s;
            opacity: 1;
        }

        .carousel img:nth-child(2) {
            animation-delay: 5s;
        }

        .carousel img:nth-child(3) {
            animation-delay: 10s;
        }

        @keyframes slide {
            0% { opacity: 0; }
            20% { opacity: 1; }
            33.33% { opacity: 1; }
            53.33% { opacity: 0; }
            100% { opacity: 0; }
        }

        .container-section {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            padding: 0 5px;
            margin-bottom: 40px;
        }

        .container-section .container {
            flex: 0 0 calc(16.666% - 10px);
            max-width: calc(16.666% - 15px);
            background: #fff;
            padding: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
        }

        .container-section .container img {
            width: 70%;
            height: auto;
            border-radius: 100px;
            object-fit: cover;
        }

        .container-section .container h3 {
            margin-top: 15px;
            font-size: 1.2rem;
            color: #f2f4f7;
        }

        footer {
            background: #939494;
            color: #191919;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px; /* Add margin-top to the footer */
        }

        #ch-container.paint-effect:hover {
            background-color: rgba(225, 225, 22, 0.5);
        }

        #se-container.paint-effect:hover {
            background-color: rgba(101, 128, 235, 0.5); 
        }

        #he-container.paint-effect:hover {
            background-color: rgba(153, 249, 124, 0.5); /
        }

        #re-container.paint-effect:hover {
            background-color: rgba(251, 89, 89, 0.5); /
        }

        #cd-container.paint-effect:hover {
            background-color: rgba(215, 103, 243, 0.5); /
        }

        #nw-container.paint-effect:hover {
            background-color: rgba(94, 91, 95, 0.5); /
        }

        .additional-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .container-box {
            width: 100%;
            height: 300px;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px; /* Add margin-bottom to ensure space between container-box and footer */
        }

        .text-section h2 {
            color: #f4f6f8;
        }

        .container-box .image-section {
            margin-top: 20px;
            display: flex;
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .container-box .image-container {
            display: flex;
            width: calc(100% * 5); /* 5 images */
            animation: slideAdditional 10s infinite;
        }

        .container-box .image-container img {
            width: 200px;
            height: 100px;
            padding: 10px;
            object-fit: cover;
            border-radius: 10px;
        }

        .additional-image {
            height: 380px;
            width: auto;
            object-fit: cover;
        }

        @keyframes slideAdditional {
            0% { transform: translateX(0); }
            20% { transform: translateX(0); }
            25% { transform: translateX(-20%); }
            45% { transform: translateX(-20%); }
            50% { transform: translateX(-40%); }
            70% { transform: translateX(-40%); }
            75% { transform: translateX(-60%); }
            95% { transform: translateX(-60%); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <center>
                    <img src="assets/img/logo1.gif" height=150px;>
                    </center>
                </a>
                <nav class="navbar" style="float: right;">
                    <ul class="nav-links" style="list-style: none; display: flex; gap: 20px; margin: 0; padding-left: 900px; float: right;">
                        <li><a href="home.php" style="color: #000; text-decoration: none;">Home</a></li>
                        <li><a href="index.php" style="color: #000; text-decoration: none;">User Login</a></li>
                        <li><a href="signup.php" style="color: #000; text-decoration: none;">Sign up</a></li>
                        <li><a href="adminlogin.php" style="color: #000; text-decoration: none;">Admin Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    
    <header class="hero-section">
        <h1>Welcome to VIDYA SANCHAYANAM </h1>
        <h1>The World Of Knowledge</h1>
        <button class="cta-button" onclick="location.href='index.php'">Explore Now</button>
    </header>
    <section class="hero">
        <div class="carousel">
            <img src="lib4.jpg" alt="Lib Image 1">
            <img src="lib2.jpg" alt="Lib Image 2">
            <img src="lib1.jpg" alt="Lib Image 3">
        </div>
    </section>
    <h2 style="color: #0073e6; margin-left: 35px;">Various Categories in Library</h2>
    <section class="container-section">
        <div id="se-container" class="container paint-effect">
            <img src="se.jpg" alt="Book Image 1">
            <h3 style="color: #023262;">School Education</h3>
            
        </div>
        <div id="he-container" class="container paint-effect">
            <img src="he.jpg" alt="Book Image 2">
            <h3 style="color: rgb(1, 68, 1);">Higher Education</h3>
            
        </div>
        <div id="re-container" class="container paint-effect">
            <img src="re.jpg" alt="Book Image 3">
            <h3 style="color: rgb(136, 4, 4);">Research</h3>
            
        </div>
        <div id="cd-container" class="container paint-effect">
            <img src="cd.jpg" alt="Book Image 4">
            <h3 style="color: rgb(101, 1, 101);">Career Development</h3>
            
        </div>
        <div id="ch-container" class="container paint-effect">
            <div class="image-container">
                <img src="ch.jpg" alt="Book Image 5">
            </div>
            <h3 style="color: rgb(93, 59, 5);">Cultural Archives</h3>
            
        </div>
        <div id="nw-container" class="container paint-effect">
            <img src="nw.jpg" alt="Book Image 6">
            <h3 style="color: rgb(70, 68, 68);">Newspaper Archives</h3>
            
        </div>
    </section>
    <section class="additional-section">
        <div class="container-box">
            <div class="text-section">
                <h2 style="color: rgb(31, 31, 31);">About US</h2>
                <p style="color: black; font-style:italic;">Our online library management system streamlines the management of library resources and enhances user experience. Users can search for materials through a digital catalog, place holds or reservations online, and receive notifications when items are ready for pickup. Borrowing and returning books are simplified through automated tracking, and digital lending allows users to borrow e-books and audiobooks conveniently. Additionally, our system manages overdue fines, sends reminders for due dates, and generates reports on library usage and inventory, while also offering features like user account management and support for interlibrary loans.</p>
            </div>
            <div class="image-section">
                <div class="image-container">
                    <img src="https://i.redd.it/p0qm7hg0vsla1.jpg" alt="Image 1">
                    <img src="https://cdn.pixabay.com/photo/2020/06/06/14/35/books-5266801_640.jpg" alt="Image 2">
                    <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Image 3">
                    <img src="https://t3.ftcdn.net/jpg/06/25/25/60/360_F_625256025_ohJcE1pPJwzbRY0oUl1LvJSfWiKb1CMR.jpg" alt="Image 4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJmThfQfWoHcIOJNe8xPizJai443X86f1oRZUHfznbp0SwaOYOX7k7JXZVH8sDdMbALB8&usqp=CAU" alt="Image 5">
                </div>
            </div>
        </div>
        <img src="lib3.jpg" alt="Image 5" class="additional-image" style="width: 300px;">
    </section>
    <footer>
        <div class="container">
            <p>&copy;  Online Library Management System. </p>
        </div>
    </footer>
</body>
</html>
