<?php
include('db_connection.php');

if(isset($_REQUEST['InstructorID'])) {
    $InstructorID = $_REQUEST['InstructorID'];
    
    // Prepare and execute SELECT statement to retrieve instructor details
    $stmt = $connection->prepare("SELECT * FROM instructors WHERE InstructorID = ?");
    $stmt->bind_param("i", $InstructorID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['InstructorID'];
        $z = $row['Name'];
        $y = $row['gender'];
        $v = $row['telephone'];
        $a = $row['Email'];
        $e = $row['address'];
        $b = $row['Specialization'];
    } else {
        echo "Instructor not found.";
    }
}

?>

<html>
<head>
    <title>Update Instructor</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="InstructorID">InstructorID:</label>
        <input type="number" name="InstructorID" value="<?php echo isset($x) ? $x : ''; ?>" readonly>
        <br><br>

        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        
        <label for="Gender">Gender:</label>
        <input type="text" name="Gender" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        
        <label for="telephone">Telephone:</label>
        <input type="tel" name="telephone" value="<?php echo isset($v) ? $v : ''; ?>">
        <br><br>
        
        <label for="Email">Email:</label>
        <input type="email" name="Email" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        
        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>
        
        <label for="Specialization">Specialization:</label>
        <input type="text" name="Specialization" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $InstructorID = $_POST['InstructorID'];
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Telephone = $_POST['telephone'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Specialization = $_POST['Specialization'];
    
    // Update the instructor in the database
    $stmt = $connection->prepare("UPDATE instructors SET Name=?, gender=?, telephone=?, Email=?, address=?, Specialization=? WHERE InstructorID=?");
    $stmt->bind_param("ssssssi", $Name, $Gender, $Telephone, $Email, $Address, $Specialization, $InstructorID);
    
    if ($stmt->execute()) {
        // Redirect to view page after successful update
        header('Location: instructor_table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating instructor: " . $stmt->error;
    }
}
?>
