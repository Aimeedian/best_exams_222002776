<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
            padding: 5px 10px;
            font-size: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
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
<p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>Online Investment Trainning Planning Platform</i></p>
<h2 class="heading">LISTS OF LESSONS </h2>
<div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>

<div class="container">
    <table>
        <thead>
            <tr>              
                <th>Lesson ID</th>
                <th>Course ID</th>
                <th>Lesson Title</th>
                <th>Content</th>
                <th>Video URL</th>
                <th>Quiz ID</th> <!-- Removed extra spaces -->
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // PHP Code to Retrieve Data from Database
            include('db_connection.php');
            $sql = "SELECT * FROM lessons";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["LessonID"]."</td>";
                    echo "<td>".$row["CourseID"]."</td>";
                    echo "<td>".$row["LessonTitle"]."</td>";
                    echo "<td>".$row["Content"]."</td>";
                    echo "<td>".$row["VideoURL"]."</td>";
                    echo "<td>".$row["QuizID"]."</td>"; 
                    echo "<td>";
                    echo "<a href='update_lesson.php?LessonID=".$row["LessonID"]."' class='btn btn-update'>Update</a>";
                    echo "<a href='delete_lesson.php?LessonID=".$row["LessonID"]."' class='btn btn-delete'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>"; 
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<footer>
    <p style="text-align: center;">Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
