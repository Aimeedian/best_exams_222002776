<?php
include('db_connection.php');

if (isset($_REQUEST['TraineeID'])) {
    $TraineeID = $_REQUEST['TraineeID'];

    // Prepare and execute SELECT statement to retrieve trainee details
    $stmt = $connection->prepare("SELECT * FROM trainees WHERE TraineeID = ?");
    $stmt->bind_param("i", $TraineeID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['TraineeID'];
        $z = $row['FirstName'];
        $y = $row['LastName'];
        $a = $row['Email'];
        $v = $row['Phone'];
        $e = $row['Address'];
    } else {
        echo "TraineeID not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trainee</title>
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

       input[type="number"], input[type="text"], input[type="email"], input[type="tel"], textarea {
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
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>

<form method="POST" onsubmit="return confirmUpdate();">
    <label for="TraineeID">Trainee ID:</label>
    <input type="number" name="TraineeID" value="<?php echo isset($x) ? $x : ''; ?>" readonly>
    <br><br>

    <label for="FirstName">First Name:</label>
    <input type="text" name="FirstName" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>
    
    <label for="LastName">Last Name:</label>
    <input type="text" name="LastName" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>
       
    <label for="Email">Email:</label>
    <input type="email" name="Email" value="<?php echo isset($a) ? $a : ''; ?>">
    <br><br>
    
    <label for="Telephone">Phone:</label>
    <input type="tel" name="Telephone" value="<?php echo isset($v) ? $v : ''; ?>">
    <br><br>
    
    <label for="Address">Address:</label>
    <input type="text" name="Address" value="<?php echo isset($e) ? $e : ''; ?>">
    <br><br>
    
    <input type="submit" name="up" value="Update Trainee">
</form>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $TraineeID = $_POST['TraineeID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Telephone = $_POST['Telephone'];
    $Address = $_POST['Address'];
    
    // Update the trainee in the database
    $stmt = $connection->prepare("UPDATE trainees SET FirstName=?, LastName=?, Email=?, Phone=?, Address=? WHERE TraineeID=?");
    $stmt->bind_param("sssssi", $FirstName, $LastName, $Email, $Telephone, $Address, $TraineeID);
    
    if ($stmt->execute()) {
        // Redirect to view page after successful update
        header('Location: trainees_table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating trainee: " . $stmt->error;
    }
}
?>

</body>
</html>
