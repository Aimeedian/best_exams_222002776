<!DOCTYPE html>
<html lang="en">
<head>
    <!-- official website designed by G8 on 24th march 2024-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Investment</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <style>
        /* Basic styling for demonstration purposes */
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header styling */
        .header {
            display: flex;
            align-items: center;
            background-color: dodgerblue;
            padding: 3px;
            border-bottom: 5px solid black;
        }
        .header h3 {
            color: white;
            margin: 0;
            font-weight: bold;
        }
        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navigation li {
            display: inline-block;
            margin-right: 10px;
        }
        .navigation li a {
            text-decoration: none;
            color: white;
            padding: 8px 15px;
            border-radius: 3px;
        }
        .navigation li a:hover {
            background-color: deeppink;
        }

        /* Search bar styling */
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input[type="search"] {
            width: 150px;
            padding: 8px;
            border-radius: 10px;
            border: none;
        }
        .search-bar button[type="submit"] {
            background-color: red;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-bar button[type="submit"]:hover {
            background-color: darkred;
        }

        /* Footer styling */
        footer {
            background-color: darkred;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 25px;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        /* Dropdown styles */
        .dropdown-contents {
            display: none;
            position: absolute;
            background-color: tomato;
            text-decoration: none;
            min-width: 120px;
            z-index: 1;
        }
        .dropdown-contents a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .dropdown-contents a:hover {
            background-color: red;
        }
        .dropdown:hover .dropdown-contents {
            display: block;
        }
        .p1 {
    font-size: 25px; /* Adjust font size as needed */
    line-height: 1.6; /* Adjust line height as needed */
    color: white; /* Text color */
    margin-bottom: 10px; /* Bottom margin */
    margin-top: 0; /* Top margin */
    margin-left: 0; /* Left margin */
    margin-right: 0; /* Right margin */
    font-family: Arial, sans-serif; /* Font family */
    font-weight: bold; /* Font weight */
}

    </style>
</head>
<body>
<header>
    <div class="header">
        <p class="p1"><i>Online Investment Training<br> Planning Platform</i></p>
        <ul class="navigation">
            <li><a href="home.html">Home</a></li>
            <li><a href="about us.html">About Us</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="service.php">Service</a></li>

            <li class="dropdown">
                <a href="#">Forms</a>
                <div class="dropdown-contents">
                    <a href="course.php">Course</a>
                    <a href="comment.php">Comment</a>
                    <a href="lesson.php">Lesson</a>
                    <a href="Quiz.php">Quizes</a>
                    
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Tables</a>
                <div class="dropdown-contents">
                    <a href="course_table.php">Course</a>
                    <a href="comment_table.php">Comment</a>
                    <a href="lesson_table.php">Lesson</a>
                    <a href="Quiz_table.php">Quizes</a>
                    <a href="resource_table.php">Resource</a>
                    
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Settings</a>
                <div class="dropdown-contents">
                  <a href="all.php">Instructors</a>
                    <a href="adminlogin.php">Admin</a>
                    <a href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</header>

<footer>
    <p>&copy; Designed by KUBWIMANA Aimee Diane & BIT year 2&reg2024 </p>
</footer>
</body>
</html>
