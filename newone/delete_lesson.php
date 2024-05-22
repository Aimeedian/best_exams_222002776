<?php
// Connection details
include('db_connection.php');
// Check if LessonID is set
if(isset($_REQUEST['LessonID'])) {
    $LessonID = $_REQUEST['LessonID'];
    
    // Disable foreign key checks temporarily
    $conn->query('SET foreign_key_checks = 0');

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM lessons WHERE LessonID=?");
    $stmt->bind_param("i", $LessonID);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location:lesson_table.php");
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="LessonID" value="<?php echo $LessonID; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php

    // Re-enable foreign key checks
    $conn->query('SET foreign_key_checks = 1');

    $stmt->close();
} else {
    echo "Lesson is not set.";
}

$conn->close();
?>
