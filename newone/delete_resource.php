<?php
// Connection details
include('db_connection.php');

// Check if ResourceID is set
if(isset($_REQUEST['ResourceID'])) {
    $ResourceID = $_REQUEST['ResourceID'];
    
    // Disable foreign key checks temporarily
    $conn->query('SET foreign_key_checks = 0');

    // Prepare the DELETE statement for the investment_planning_resource table
    $stmt = $conn->prepare("DELETE FROM investment_planning_resources WHERE ResourceID=?");
    
    // Check if prepare() succeeded
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Bind parameters
    $stmt->bind_param("i", $ResourceID);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close(); // Close the statement
        header("location: resource_table.php");
        exit(); // Add exit() after header to prevent further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
} else {
    echo "Resource ID is not set.";
}

// Re-enable foreign key checks
$conn->query('SET foreign_key_checks = 1');

$conn->close();
?>
