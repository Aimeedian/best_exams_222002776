<?php
// Connection details
include('db_connection.php');

// Check if CertificateID is set
if(isset($_REQUEST['CertificateID'])) {
    $CertificateID = $_REQUEST['CertificateID'];
    
    // Prepare and execute the DELETE statement targeting the 'certificates' table
    $stmt = $conn->prepare("DELETE FROM certificates WHERE CertificateID=?");
    $stmt->bind_param("i", $CertificateID);

    // Execute the DELETE statement if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            header("location: certificate_table.php");
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
            <input type="hidden" name="CertificateID" value="<?php echo $CertificateID; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "CertificateID is not set.";
}

$conn->close();
?>
