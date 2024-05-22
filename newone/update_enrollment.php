<?php
include('db_connection.php');

// Check if EnrollmentID is set
if (isset($_REQUEST['EnrollmentID'])) {
    $EnrollmentID = $_REQUEST['EnrollmentID'];

    // Prepare and execute SELECT statement to retrieve enrollment details
    $stmt = $conn->prepare("SELECT * FROM enrollment WHERE EnrollmentID = ?");
    
    // Check if the prepare statement was successful
    if ($stmt) {
        $stmt->bind_param("i", $EnrollmentID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $x = $row['EnrollmentID'];
            $z = $row['UserID'];
            $y = $row['CourseID'];
            $e = $row['CompletionStatus'];
            $a = $row['EnrollmentDate'];
        } else {
            echo "Enrollment not found.";
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

?>

<html>
<head>
    <title>Update Enrollment</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="EnrollmentID">EnrollmentID:</label>
        <input type="number" name="EnrollmentID" value="<?php echo isset($x) ? $x : ''; ?>" readonly>
        <br><br>

        <label for="UserID">UserID:</label>
        <input type="number" name="UserID" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        
        <label for="CourseID">CourseID:</label>
        <input type="number" name="CourseID" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        
        <label for="CompletionStatus">Completion Status:</label>
        <input type="text" name="CompletionStatus" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>
         
        <label for="EnrollmentDate">Enrollment Date:</label>
        <input type="date" name="EnrollmentDate" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from the form
    $EnrollmentID = $_POST['EnrollmentID'];
    $UserID = $_POST['UserID'];
    $CourseID = $_POST['CourseID'];
    $CompletionStatus = $_POST['CompletionStatus'];
    $EnrollmentDate = $_POST['EnrollmentDate'];
    
    // Update the enrollment in the database
    $stmt = $conn->prepare("UPDATE enrollment SET UserID=?, CourseID=?, CompletionStatus=?, EnrollmentDate=? WHERE EnrollmentID=?");
    
    // Check if the prepare statement was successful
    if ($stmt) {
        $stmt->bind_param("iissi", $UserID, $CourseID, $CompletionStatus, $EnrollmentDate, $EnrollmentID);
        
        if ($stmt->execute()) {
            // Redirect to the view page after a successful update
            header('Location: enrollment_table.php');
            exit(); // Ensure that no other content is sent after the header redirection
        } else {
            echo "Error updating enrollment: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>
