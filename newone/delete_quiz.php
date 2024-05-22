<?php
// Connection details
include('db_connection.php');

// Check if QuizID is set
if(isset($_REQUEST['QuizID'])) {
    $QuizID = $_REQUEST['QuizID'];
    
    // Disable foreign key checks temporarily
    $conn->query('SET foreign_key_checks = 0');

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM quizzes WHERE QuizID=?");
    $stmt->bind_param("i", $QuizID);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location:quiz_table.php");
            exit(); // Add exit() after header to prevent further execution
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Quiz Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="QuizID" value="<?php echo $QuizID; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php

    // Re-enable foreign key checks
    $conn->query('SET foreign_key_checks = 1');

    $stmt->close();
} else {
    echo "Quiz ID is not set.";
}

$conn->close();
?>
