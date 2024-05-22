<?php
session_start();
include('db_connection.php');
include('menu.php');

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
    <title>Investment Training Service</title>
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
            width: 100%;
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
            <h2>Welcome to the Online Investment Training Service</h2>
            <p>Our investment training service provides a comprehensive learning experience designed to help you become a proficient investor. Explore our curated video courses covering various aspects of investing, from beginner to advanced levels.</p>
            <div class="video-container">
                <div class="video-box">
                    <video id="video1" controls>
                        <source src="./video/video4.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p><strong>Cryptocurrency and Blockchain Investments</strong><br>Learn about the basics of cryptocurrencies, blockchain technology, and how to invest in digital assets safely and effectively.</p>
                    <button style="background-color: pink;padding: 15px;width: 50%;"> <a href="course.php" style="color: red;font-size: 20px;text-decoration: none;">apply now</a></button>
                </div>
                <div class="video-box">
                    <video id="video2" controls>
                        <source src="./video/video5.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p><strong>Technical Analysis</strong><br>Understand the principles of technical analysis and how to use charts and indicators to make informed investment decisions.</p>
                    <button style="background-color: pink;padding: 15px;width: 50%;"> <a href="course.php" style="color: red;font-size: 20px;text-decoration: none;">apply now</a></button>
                </div>
                <div class="video-box">
                    <video id="video3" controls>
                        <source src="./video/video3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p><strong>Financial Modeling for Investment</strong><br>Learn how to build and interpret financial models to evaluate investment opportunities and risks.</p>
                    <button style="background-color: pink;padding: 15px;width: 50%"> <a href="course.php" style="color: red;font-size: 20px;text-decoration: none;">apply now</a></button>
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
                xhr.open("POST", "service.php", true);
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
]