
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Progress Form</title>
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
            background-color: transparent;
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
        select,
        textarea {
            width: calc(100% - 20px);
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

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%;
        }

        select {
            appearance: none; /* Remove default arrow */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Custom arrow */
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 24px;
            cursor: pointer;
        }

        footer {
            background-color: teal;
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
    <div class="container">
        <h2 class="heading">User Progress Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="UserID">Select User:</label>
                <select name="UserID" id="UserID" required>
                    <option value="">Select User</option>
                    <?php
                    include('db_connection.php');

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
                <label for="CourseID">Select Course:</label>
                <select name="CourseID" id="CourseID" required>
                    <option value="">Select Course</option>
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
            <div class="form-group">
                <label for="LessonID">Select Lesson:</label>
                <select name="LessonID" id="LessonID" required>
                    <option value="">Select Lesson</option>
                    <?php
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
                <label for="LastAccessed">Last Accessed:</label>
                <input type="datetime-local" name="LastAccessed" id="LastAccessed" required>
            </div>
            <div class="form-group">
                <label for="CompletionStatus">Completion Status:</label>
                <select name="CompletionStatus" id="CompletionStatus" required>
                    <option value="0">Incomplete</option>
                    <option value="1">Complete</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Score">Score:</label>
                <input type="text" name="Score" id="Score" required>
            </div>
            <div class="form-group">
                <label for="DateStarted">Date Started:</label>
                <input type="date" name="DateStarted" id="DateStarted" required>
            </div>
            <div class="form-group">
                <label for="DateCompleted">Date Completed:</label>
                <input type="date" name="DateCompleted" id="DateCompleted">
            </div>
            <div class="form-group">
                <label for="Comments">Comments:</label>
                <textarea name="Comments" id="Comments" rows="5"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit">
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>
   <?php
    // Include your database connection parameters here if not included in the menu.php file
    include('db_connection.php');

        if(isset($_POST['submit'])) {
            // Prepare and bind statement
            $stmt = $conn->prepare("INSERT INTO userprogresses (UserID, CourseID, LessonID, LastAccessed, CompletionStatus, Score, DateStarted, DateCompleted, Comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiissssss", $userID, $courseID, $lessonID, $lastAccessed, $completionStatus, $score, $dateStarted, $dateCompleted, $comments);

            // Set parameters and execute
            $userID = $_POST['UserID'];
            $courseID = $_POST['CourseID'];
            $lessonID = $_POST['LessonID'];
            $lastAccessed = $_POST['LastAccessed'];
            $completionStatus = $_POST['CompletionStatus'];
            $score = $_POST['Score'];
            $dateStarted = $_POST['DateStarted'];
            $dateCompleted = isset($_POST['DateCompleted']) ? $_POST['DateCompleted'] : null;
            $comments = isset($_POST['Comments']) ? $_POST['Comments'] : null;

            // Execute statement
            if ($stmt->execute()) {
                 echo "<script>alert('data are inserted successfully.'); window.location.href = progress_table.php?id=$user_id';</script>"; 
            } else {
                echo "Error inserting record: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    
    ?>
</body>
</html>
