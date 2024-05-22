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

        .container {
            width: 80%;
            margin: 50px auto;
           
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
            padding: 5px;
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

<h2 class="heading"> Online Investment Trainning Planning Platform </h2>
<p class="heading"><i>Investment Planning Resource List</i></p>
<div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Resource Id</th>
                
                <th>Resource Type</th>
                <th>Resource Title</th>
                <th>Description</th>
                <th>Video Url</th>
                <th>UploadedBy</th>
                <th>Course Id</th>
                <th>Lesson Id</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // PHP Code to Retrieve Data from Database
            include('db_connection.php');
            $sql = "SELECT * FROM investment_planning_resources";
            $result = $conn->query($sql);
                          

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["ResourceID"]."</td>";
                    echo "<td>".$row["ResourceType"]."</td>";
                    echo "<td>".$row["ResourceTitle"]."</td>";
                    echo "<td>".$row["Description"]."</td>";
                    echo "<td>".$row["URL"]."</td>";
                    echo "<td>".$row["UploadedBy"]."</td>";
                     echo "<td>".$row["CourseID"]."</td>";
                    echo "<td>".$row["LessonID"]."</td>";
                    echo "<td>";
             echo "<a href='update_resource.php?ResourceID=".$row["ResourceID"]."' class='btn btn-update'>Update</a>";
                echo "<a href='delete_resource.php?ResourceID=".$row["ResourceID"]."' class='btn btn-delete'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<button style="background-color: tomato;padding: 10px;margin-left: 500px;" ><a href="resource.php" style="text-decoration: none;color: white; font-size: 20px;">add resource</a></button>
<footer>
    <p style="text-align: center;">Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
