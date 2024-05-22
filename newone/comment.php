<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
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
        input[type="password"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        input[type="option"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
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

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%;
        }

        select {
            width: calc(100% - 12px); /* Adjusted width */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none; /* Remove default arrow */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Custom arrow */
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 24px;
            cursor: pointer;
        }
    </style>
    <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<body style="background-image: url('./img.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <h2 class="heading">Online Investment Training Platform System</h2>
    <div class="container">
        <h2 class="heading">Comment Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" id="user_id">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "online_investment_training_system";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT UserID, Username, Email FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['UserID'] . "'>" . $row['Username'] . " (" . $row['Email'] . ")</option>";
                        }
                    } else {
                        echo "<option value=''>No users available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="course_id">Select Course:</label>
                <select name="course_id" id="course_id">
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT CourseID,CourseName FROM courses";
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
           
            <div class="form-group">
                <label for="completion_status">Comment Text:</label>
                <input type="text" name="completion_status" id="completion_status" required>
            </div>
             <div class="form-group">
                <label for="enrollment_date">Comment Date:</label>
                <input type="date" name="enrollment_date" id="enrollment_date" required>
            </div>
            <input type="submit" name="send" value="send">
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_investment_training_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['send'])) {
        $commentID = ""; // Assuming CommentID is auto-incremented in the database
        $userID = $_POST['user_id'];
        $courseID = $_POST['course_id'];
        $commentText = $_POST['completion_status'];
        $commentDate = $_POST['enrollment_date']; 

        $stmt = $conn->prepare("INSERT INTO comments (CommentID, UserID, CourseID, CommentText, CommentDate) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $commentID, $userID, $courseID, $commentText, $commentDate);

        if ($stmt->execute()) {
            echo "<script>alert('Comment added successful.'); window.location.href = '#?id=$userID';</script>"; 
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
    }

    $conn->close();
    ?>

    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
