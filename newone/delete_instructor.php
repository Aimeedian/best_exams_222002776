<?php
// Connection details
include('db_connection.php');

// Check if LessonID is set
if(isset($_REQUEST['InstructorID'])) {
    $InstructorID = $_REQUEST['InstructorID'];
    
    // Disable foreign key checks temporarily
    $conn->query('SET foreign_key_checks = 0');

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM instructors WHERE InstructorID=?");
    $stmt->bind_param("i", $InstructorID);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location:instructor_table.php");
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
            <input type="hidden" name="InstructorID" value="<?php echo $InstructorID; ?>">
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
