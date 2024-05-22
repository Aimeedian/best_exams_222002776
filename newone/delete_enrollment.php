<?php
// Connection details
include('db_connection.php');

// Check if EnrollmentID is set
if(isset($_REQUEST['EnrollmentID'])) {
    $EnrollmentID = $_REQUEST['EnrollmentID'];
    
    // Prepare and execute the DELETE statement targeting the 'enrollment' table
    $stmt = $conn->prepare("DELETE FROM enrollment WHERE EnrollmentID=?");
    $stmt->bind_param("i", $EnrollmentID);

    // Execute the DELETE statement if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location: enrollment_table.php");
            exit(); // Ensure that no other content is sent after the header redirection
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
            <input type="hidden" name="EnrollmentID" value="<?php echo $EnrollmentID; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "EnrollmentID is not set.";
}

$conn->close();
?>
