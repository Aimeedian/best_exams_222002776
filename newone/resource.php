<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid red;
            background-color: yellow;
            border-radius: 10px;
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 20px;
            color: black;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="button"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: white;
        }

        input[type="button"] {
            background-color: #007bff;
            color: white;
        }

        select {
            width: calc(100% - 12px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 24px;
            cursor: pointer;
        }
    </style>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert('Please enter a valid 10-digit phone number');
                return false;
            }

            return true;
        }
    </script>
</head>
<body style="background-image: url('./img.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <h2 class="heading">Online Investment Training Platform System</h2>
    <div class="container">
        <h2 class="heading">Investment Planning Resource Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="type">Resource Type:</label>
                <input type="text" name="type" id="type" required>
            </div>
            <div class="form-group">
                <label for="title">Resource Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" name="desc" id="desc" required>
            </div>
            <div class="form-group">
                <label for="url">Resource URL:</label>
                <input type="text" name="url" id="url" required>
            </div>
            <div class="form-group">
                <label for="udate">Uploaded Date:</label>
                <input type="date" name="udate" id="udate" required>
            </div>
            <div class="form-group">
                <label for="lesson">Select Lesson:</label>
                <select name="lesson" id="lesson">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "online_investment_training_system";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT LessonID, LessonTitle FROM lessons";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['LessonID'] . "'>" . $row['LessonTitle'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No lessons available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="course">Select Course:</label>
                <select name="course" id="course">
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT CourseID, CourseName FROM courses";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No courses available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <input type="submit" name="send" value="Send">
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>

    <?php
include('db_connection.php');
if(isset($_POST['send'])) {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    $udate = $_POST['udate'];
    $lesson = $_POST['lesson'];
    $course = $_POST['course'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO investment_planning_resources (ResourceType, ResourceTitle, Description, URL, UploadDate, LessonID, CourseID) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepare statement succeeded
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssssi", $type, $title, $desc, $url, $udate, $lesson, $course);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('data are inserted successfully.'); window.location.href = 'resource_table.php?id=$user_id';</script>"; 
        } else {
            echo "Error inserting record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>


    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
