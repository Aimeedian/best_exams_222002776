<?php
include('db_connection.php');

if(isset($_REQUEST['LessonID'])) {
    $LessonID = $_REQUEST['LessonID'];
    
    // Prepare and execute SELECT statement to retrieve attendee details
    $stmt = $conn->prepare("SELECT * FROM lessons WHERE LessonID = ?");
    $stmt->bind_param("i", $LessonID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['LessonID'];
        $z = $row['CourseID'];
        $y = $row['LessonTitle'];
        $e = $row['VideoURL'];
        $a = $row['Content'];
        $b = $row['QuizID'];
    } else {
        echo "Lesson not found.";
    }
}

?>

<html>
<head>
    <title>Update Attendee</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="AttendeeID">LessonID:</label>
        <input type="number" name="LessonID" value="<?php echo isset($x) ? $x : ''; ?>" readonly>
        <br><br>

        <label for="course">CourseID:</label>
        <input type="number" name="course" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        
        <label for="title">LessonTitle:</label>
        <input type="text" name="title" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        
        <label for="url">Video URL:</label>
        <input type="file" name="url" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>
         
        <label for="content">Content:</label>
        <input type="text" name="content" value="<?php echo isset($a) ? $e : ''; ?>">
        <br><br>

       

        <label for="quiz">Quiz ID:</label>
        <input type="number" name="quiz" value="<?php echo isset($b) ? $e : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $LessonID = $_POST['LessonID'];
    $UserID = $_POST['course'];
    $Fullname = $_POST['title'];
    $Email = $_POST['url'];
    $Em = $_POST['content'];
    $E = $_POST['quiz'];
    
    // Update the attendee in the database
    $stmt = $conn->prepare("UPDATE lessons SET CourseID=?, LessonTitle=?, VideoURL=?, Content=?, QuizID=? WHERE LessonID=?");
    $stmt->bind_param("sssssi", $UserID, $Fullname, $Email,$Em,$E,$LessonID);
    
    if ($stmt->execute()) {
        // Redirect to view page after successful update
        header('Location: lesson_table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating lesson: " . $stmt->error;
    }
}
?>