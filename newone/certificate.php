
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"],
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<body>
    <h2 style="text-align: center;">Certificate Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"  onsubmit="return validateForm()>
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" id="user_id" required>

        <label for="course_id">Course ID:</label>
        <input type="number" name="course_id" id="course_id" required>

        <label for="grade">Grade:</label>
        <input type="text" name="grade" id="grade" required>

        <label for="completion_date">Completion Date:</label>
        <input type="date" name="completion_date" id="completion_date" required>

        <label for="duration">Duration (in months):</label>
        <input type="number" name="duration" id="duration" required>

        <input type="submit" name="submit" value="Submit"> 
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Database connection parameters
        $servername = "localhost";
        $username = "root"; // Replace with your actual username
        $password = ""; // Replace with your actual password
        $dbname = "online_investment_training_system"; // Replace with your actual database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO Certificates (UserID, CourseID, Grade, CompletionDate, Duration) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissi", $user_id, $course_id, $grade, $completion_date, $duration);

        // Set parameters and execute
        $user_id = $_POST['user_id'];
        $course_id = $_POST['course_id'];
        $grade = $_POST['grade'];
        $completion_date = $_POST['completion_date'];
        $duration = $_POST['duration'];

        if ($stmt->execute()) {
          echo "<script>alert('data are inserted successfully.'); window.location.href = certificate_table.php?id=$user_id';</script>"; 
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>
