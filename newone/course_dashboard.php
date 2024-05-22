<?php
session_start();
include('db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Handle course completion data submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['completed'])) {
    $course_id = $_POST['course_id'];
    $stmt = $conn->prepare("INSERT INTO course_progress (username, course_id, completed) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE completed = ?");
    $completed = 1; // assuming 1 means completed
    $stmt->bind_param("siii", $username, $course_id, $completed, $completed);
    if ($stmt->execute()) {
        echo "Course progress saved.";
    } else {
        echo "Error saving progress.";
    }
    $stmt->close();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        #course {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .video-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .video-box {
            flex: 1 1 calc(50% - 20px);
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }
        .video-box video {
            width: 50%;
            border-radius: 5px;
        }
        .video-box p {
            margin: 10px 0 0;
            font-size: 14px;
            color: #333;
        }
        #course button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
        }
        #course button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="course">
        <p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>Online Investment Trainning Planning Platform</i></p>
            <h2>Course Title</h2>
            <div class="video-container">
                <div class="video-box">
                    <video id="video1" controls>
                        <source src="./video/video5.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Cryptocurrency and Blockchain Investments</p>
                </div>
                <div class="video-box">
                    <video id="video2" controls>
                        <source src="./video/video2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Technical Analysis</p>
                </div>
                <div class="video-box">
                    <video id="video3" controls>
                        <source src="./video/video3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Financial Modeling for Investment</p>
                </div>
                <div class="video-box">
                    <video id="video4" controls>
                        <source src="./video/video1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Value Investing </p>
                </div>
                <div class="video-box">
                    <video id="video5" controls>
                        <source src="./video/video2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p>Real Estate Investment</p>
                </div>
            </div>
            <button id="completeCourseBtn">Complete Course</button>
        </div>
    </div>

    <script>
        document.getElementById('completeCourseBtn').addEventListener('click', function() {
            var videos = document.querySelectorAll('.video-box video');
            var allWatched = true;
            
            videos.forEach(function(video) {
                if (video.currentTime < video.duration) {
                    allWatched = false;
                }
            });

            if (allWatched) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "course.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert("Course completed and progress saved.");
                    }
                };
                xhr.send("completed=1&course_id=1"); // assuming course_id is 1
            } else {
                alert("Please watch all videos completely before completing the course.");
            }
        });
    </script>
</body>
</html>

<?php
// Database connection
include('db_connection.php');
?>
