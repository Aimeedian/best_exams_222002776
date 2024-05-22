<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Form</title>
    <style>
   <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .btn {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 20px;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-update {
            background-color: #28a745;
        }
        .heading{
            font-size: 25px;
            font-weight:bold;
            color: #007bff;
        }
        footer {
            background-color:teal;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 25px;
            position: fixed;
            bottom: 0;
            left: 0;
    </style>
  
</head>
<body>

<center><h2 class="heading"><i>Online Investment Training Platform System</i></h2>

<div class="container">
    <h2 class="heading"><i>List of Question And Their Answers</i></h2>
    <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>
    <table>
        <tr>
            <th>Quiz Id</th>
            <th>Course ID</th>
            <th>Quiz Title</th>
            <th>Question</th>
            <th>Answers</th>
            <th>Correct Answers</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        // PHP Code to Retrieve Data from Database
        include('db_connection.php');
        $sql = "SELECT * FROM quizzes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["QuizID"]."</td>";
                echo "<td>".$row["CourseID"]."</td>";
                echo "<td>".$row["QuizTitle"]."</td>";
                echo "<td>".$row["Questions"]."</td>";
                echo "<td>".$row["Answers"]."</td>";
                echo "<td>".$row["CorrectAnswers"]."</td>";
                // Add update and delete buttons with links to update.php and delete.php
                echo "<td><a href='update_quiz.php?QuizID=".$row["QuizID"]."'>Update</a> | <a href='delete_quiz.php?QuizID=".$row["QuizID"]."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No courses found</td></tr>";
        }
        ?>
    </table>
</div>
</center>
<footer>
    <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
