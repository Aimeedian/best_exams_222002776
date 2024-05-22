<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Management</title>
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

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        }

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
    </style>
</head>
<body>
    <h2 class="heading">Online Investment Training Platform System</h2>
    <h2 class="heading">Certificate Management</h2>

    <table>
        <thead>
            <tr>
                <th>Certificate ID</th>
                <th>User ID</th>
                <th>Course ID</th>
                <th>Grade</th>
                <th>Completion Date</th>
                <th>Duration (months)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // PHP Code to Retrieve Data from Database
            include("db_connection.php");

            $sql = "SELECT * FROM Certificates";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["CertificateID"]."</td>";
                    echo "<td>".$row["UserID"]."</td>";
                    echo "<td>".$row["CourseID"]."</td>";
                    echo "<td>".$row["Grade"]."</td>";
                    echo "<td>".$row["CompletionDate"]."</td>";
                    echo "<td>".$row["Duration"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
