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
        select {
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

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%;
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
<body style="background-image: url('./img.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <h2 class="heading">Online Investment Training Platform System</h2>
    <div class="container">
        <h2 class="heading">Enrollment Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="user_id">Select Course:</label>
                <select name="user_id" id="user_id">
                    <?php
                  include('db_connection.php');

                    $sql = "SELECT CourseID, CourseName FROM courses"; // Fixed SQL query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>"; // Fixed column names
                        }
                    } else {
                        echo "<option value=''>No courses available</option>"; // Fixed error message
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quiz_id">Select Quiz:</label> <!-- Changed ID and name to quiz_id -->
                <select name="quiz_id" id="quiz_id"> <!-- Changed ID and name to quiz_id -->
                    <?php
                  include('db_connection.php');

                    $sql = "SELECT QuizID, QuizTitle FROM quizzes"; // Fixed SQL query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['QuizID'] . "'>" . $row['QuizTitle'] . "</option>"; // Fixed column names
                        }
                    } else {
                        echo "<option value=''>No quizzes available</option>"; // Fixed error message
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lesson">Lesson Title:</label>
                <input type="text" name="lesson" id="lesson" required> <!-- Changed ID to lesson -->
            </div>
            <div class="form-group">
                <label for="content">Lesson Content:</label>
                <input type="text" name="content" id="content" required> <!-- Changed ID to content -->
            </div>
            <div class="form-group">
                <label for="url">Video Url:</label> <!-- Changed for attribute to match ID -->
                <input type="text" name="url" id="url" required> <!-- Changed ID to url -->
            </div>
            <input type="submit" name="send" value="Learn"> <!-- Changed button label to "Learn" -->
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>

    <?php
   include('db_connection.php');

    if(isset($_POST['send'])) {
        $course_id = $_POST['user_id']; // Corrected variable names
        $quiz_id = $_POST['quiz_id']; // Corrected variable names
        $lesson_title = $_POST['lesson']; // Corrected variable names
        $lesson_content = $_POST['content']; // Corrected variable names
        $video_url = $_POST['url']; // Corrected variable names

        $stmt = $conn->prepare("INSERT INTO lessons (CourseID, QuizID, LessonTitle, Content, VideoURL) VALUES (?, ?, ?, ?, ?)"); // Changed column order
        $stmt->bind_param("sssss", $course_id, $quiz_id, $lesson_title, $lesson_content, $video_url); // Fixed data types and parameter order

        if ($stmt->execute()) {
            echo "<script>alert('Insertion successful.'); window.location.href = '#?id=$course_id';</script>"; // Fixed alert message
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
