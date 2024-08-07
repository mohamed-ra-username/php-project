<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav class="nav">
            <span>Dashboard</span>
            <div class="sidebar">
                <a href="Home.php" class="sideitem"> <i class="fa fa-home"></i> Home</a>
                <a href="Courses.php" class="sideitem"> <i class="fa fa-graduation-cap"></i>Courses</a>
                <a href="Students.php" class="sideitem"> <i class="fa fa-address-card"></i>Students</a>
            </div>
        </nav>
        
        <div class="content">
            <header class="Header">
                <?php
                    require_once "site_name.php"
                ?>
                </span>
                <div class="Search">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Search">
                </div>
            </header>
            <div class="cont">
                <h1>Welcome Back, 
                <?php
                    require_once "database.php";
                    if ($user == "Admin")
                    {
                        echo "Admin";
                    }else
                    {
                        echo "User";
                    }
                ?> 
                </h1>
                <div class="main_cont">
                    <div class="livecont num1">
                        <a class="livecont1" href="">
                            <i class="fa fa-group"></i>
                            <span >Total Students</span>
                            <span class = "php">
                                <?php 
                                    echo mysqli_num_rows($all_students);
                                ?>
                            </span>
                        </a>
                    </div>
                    <div class="livecont num2">
                        <a class="livecont2" href="">
                        <i class="fa fa-graduation-cap"></i>
                            <span >Total Courses</span>
                            <span class = "php">
                                <?php 
                                    echo mysqli_num_rows($all_courses);
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
