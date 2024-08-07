<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/create.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Entry</title>
    
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
                    require_once "site_name.php";
                    require_once "database.php";

                    
                    if($user != "Admin")
                    header("location:students.php");
                ?>
                </span>
                <div class="Search">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Search">
                </div>
            </header>
            <div class="cont">

            <div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
            <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
            <h1>New Entry</h1>
            <form class="create-course-form" autocomplete="on" method="post">
                <label for="name">Name:</label>
                <input class="forminput" autocomplete="name" type="text" id="name" name="name" autofocus required>
                <br>
                <label for="gpa">GPA:</label>
                <input class="forminput" autocomplete="off" type="number" inputmode="numeric" step = ".1" id="gpa" name="gpa" max='4' min = '0' required>
                <br>
                <label for="email">Email:</label>
                <input class="forminput" autocomplete="email" type="email" id="email" name="email" required>
                <br>
                <label for="courses">Course:</label>
                <select name='courses[]' autocomplete="off" id='courses' multiple>
                <?php
                
                foreach($all_courses as $course)
                {
                    $id = $course["id"];
                    $title = ucfirst($course["title"]);
                    echo "<option value = '$id' name = '$title'>";
                        echo $title;
                    echo "</option>";
                }
                
                ?>
                </select>
                <br>
                <button type="submit" name="new" id="new">Add</button>
            </form>
        </div>
    </div>
</div>
    <?php
        
        if (isset($_POST["new"])){

            $post = $_POST;
            

            $name = $post["name"];
            $gpa = $post["gpa"];
            $email = $post["email"];
            $new_courses = isset($post["courses"]) ?join(",",$post["courses"]) : null;
    
            $sql ="INSERT INTO `students` (`id`, `name`, `gpa`, `email`, `owned_courses`) VALUES (NULL, '$name', '$gpa', '$email', '$new_courses')";
            $test = mysqli_query($conn, $sql);
            if ($test)
            header("location:students.php");
        }
        
        
    ?>
</body>

<script>
    new MultiSelectTag('courses')  // id
</script>
</html>
