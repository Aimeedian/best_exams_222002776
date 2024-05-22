<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
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
    <h2>Certificate Records</h2>
    <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="search" name="query" placeholder="Search here" />
                <button type="submit">Search</button>
            </form></div>

    <table>
        <thead>
            <tr>
                <th>Certificate ID</th>
                <th>User ID</th>
                <th>Course ID</th>
                <th>Grade</th>
                <th>Completion Date</th>
                <th>Duration (months)</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "online_investment_training_system";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

            // Prepare and execute the SQL statement to select data
            $sql = "SELECT CertificateID, UserID, CourseID, Grade, CompletionDate, Duration FROM Certificates";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["CertificateID"] . "</td>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["CourseID"] . "</td>";
                    echo "<td>" . $row["Grade"] . "</td>";
                    echo "<td>" . $row["CompletionDate"] . "</td>";
                    echo "<td>" . $row["Duration"] . "</td>";
                     echo "<td>";
             echo "<a href='update_certificate.php?CertificateID=".$row["CertificateID"]."' class='btn btn-update'>Update</a>";
                echo "<a href='delete_certificate.php?CertificateID=".$row["CertificateID"]."' class='btn btn-delete'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <button style="background-color: tomato;padding: 10px;margin-left: 500px;" ><a href="certificate.php" style="text-decoration: none;color: white; font-size: 20px;">new certificate</a></button>
</body>
</html>
