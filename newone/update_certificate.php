<?php
include('db_connection.php');

// Check if CertificateID is set
if (isset($_REQUEST['CertificateID'])) {
    $CertificateID = $_REQUEST['CertificateID'];

    // Prepare and execute SELECT statement to retrieve certificate details
    $stmt = $conn->prepare("SELECT * FROM certificates WHERE CertificateID = ?");
    
    // Check if the prepare statement was successful
    if ($stmt) {
        $stmt->bind_param("i", $CertificateID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $x = $row['CertificateID'];
            $z = $row['UserID'];
            $y = $row['CourseID'];
            $e = $row['Grade'];
            $a = $row['CompletionDate'];
            $b = $row['Duration'];
        } else {
            echo "Certificate not found.";
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

?>

<html>
<head>
    <title>Update Certificate</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            margin: 20px auto;
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label{
            font-size: 20px;
            color:#007bff;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="CertificateID">CertificateID:</label>
        <input type="number" name="CertificateID" value="<?php echo isset($x) ? $x : ''; ?>" readonly>
        <br><br>
        
        <label for="Grade">Grade:</label>
        <input type="text" name="Grade" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>
         
        <label for="CompletionDate">Completion Date:</label>
        <input type="date" name="CompletionDate" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>

        <label for="Duration">Duration:</label>
        <input type="text" name="Duration" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from the form
    $CertificateID = $_POST['CertificateID'];
    $Grade = $_POST['Grade'];
    $CompletionDate = $_POST['CompletionDate'];
    $Duration = $_POST['Duration'];
    
    // Update the certificate in the database
    $stmt = $conn->prepare("UPDATE certificates SET Grade=?, CompletionDate=?, Duration=? WHERE CertificateID=?");
    
    // Check if the prepare statement was successful
    if ($stmt) {
        $stmt->bind_param("isss", $Grade, $CompletionDate, $Duration, $CertificateID);
        
        if ($stmt->execute()) {
            // Redirect to the view page after a successful update
            header('Location: certificate_table.php');
            exit(); // Ensure that no other content is sent after the header redirection
        } else {
            echo "Error updating certificate: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>
