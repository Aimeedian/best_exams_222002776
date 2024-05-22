<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Management</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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
        }
        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
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

    </style>
</head>
<body>
<p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>Online Investment Trainning Planning Platform</i></p>
<h2 style="text-align: center;">Instructor Management</h2>
<div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>

<table>
    <thead>
        <tr><th>Enrollment ID</th>
            <th>User Id</th>
            <th>Course Id</th>
            <th>Enrollment date</th>
            <th>Completion Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // PHP Code to Retrieve Data from Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "online_investment_training_system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM comments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["CommentID"]."</td>";
                echo "<td>".$row["UserID"]."</td>";
                echo "<td>".$row["CourseID"]."</td>";
                echo "<td>".$row["CommentText"]."</td>";
                echo "<td>".$row["CommentDate"]."</td>";
                
                echo "<td>";
                echo "<a href='update_comment.php?CommentID=".$row["CommentID"]."' class='btn btn-update'>Update</a>";
                echo "<a href='delete_comment.php?CommentID=".$row["CommentID"]."' class='btn btn-delete'>Delete</a>";
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

<footer>
    <p style="text-align: center;">Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
