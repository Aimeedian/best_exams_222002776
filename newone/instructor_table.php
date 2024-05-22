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
<h2 style="text-align: center;">Instructor Management</h2>
<div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>

<table>
    <thead>
        <tr><th>InstructorID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Specialization</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // PHP Code to Retrieve Data from Database
        include('db_connection.php');

        $sql = "SELECT * FROM instructors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["InstructorID"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["gender"]."</td>";
                echo "<td>".$row["telephone"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["address"]."</td>";
                echo "<td>".$row["Specialization"]."</td>";
                echo "<td>";
                echo "<a href='update_instructor.php?InstructorID=".$row["InstructorID"]."' class='btn btn-update'>Update</a>";
                echo "<a href='delete_instructor.php?InstructorID=".$row["InstructorID"]."' class='btn btn-delete'>Delete</a>";
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
 <button style="background-color: tomato;padding: 10px;margin-left: 500px;" ><a href="instructor.php" style="text-decoration: none;color: white; font-size: 20px;">add instructor</a></button>
<footer>
    <p style="text-align: center;">Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>
