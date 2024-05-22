<?php
//database connection
include('db_connection.php');

// Check if ProgressID is set
if(isset($_REQUEST['ProgressID'])) {
    $ProgressID = $_REQUEST['ProgressID'];
    
    // Prepare and execute the DELETE statement targeting the 'userprogresses' table
    $stmt = $conn->prepare("DELETE FROM userprogresses WHERE ProgressID=?");
    $stmt->bind_param("i", $ProgressID);

    // Execute the DELETE statement if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location: progress_table.php");
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
            <input type="hidden" name="ProgressID" value="<?php echo $ProgressID; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "ProgressID is not set.";
}

$conn->close();
?>
