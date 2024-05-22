<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Quiz</title>
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

        input[type="text"], input[type="date"], textarea {
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

<?php
// PHP Code to Update Data in Database
include('db_connection.php');

// Check if ProgressID is set in the URL and it's a numeric value
if(isset($_GET['ProgressID']) && is_numeric($_GET['ProgressID'])) {
    $ProgressID = $_GET['ProgressID'];

    // Check if the form is submitted via POST method
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $completionstatus = $_POST['CompletionStatus'];
        $score = $_POST['Score'];
        $DateStarted = $_POST['DateStarted'];
        $DateCompleted = $_POST['DateCompleted'];

        // Prepare and bind the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE userprogresses SET completionstatus=?, Score=?, DateStarted=?, DateCompleted=? WHERE ProgressID=?");

        // Check if the statement preparation was successful
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters to the statement
        $stmt->bind_param("ssssi", $completionstatus, $score, $DateStarted, $DateCompleted, $ProgressID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record updated successfully";
            header('Location: progress_table.php');
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }

    // Fetch the record to be updated
    $sql = "SELECT * FROM userprogresses WHERE ProgressID=$ProgressID";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <!-- Display the form to update the record -->
        <form method="post" action="" onsubmit="return confirmUpdate();">
            <input type="hidden" name="ProgressID" value="<?php echo $row['ProgressID']; ?>">
            <label for="CompletionStatus">Completion Status:</label><br>
            <input type="text" name="CompletionStatus" value="<?php echo $row['CompletionStatus']; ?>"><br>
            <label for="Score">Scores:</label><br>
            <input type="text" name="Score" value="<?php echo $row['Score']; ?>"><br>
            <label for="DateStarted">Date Started:</label><br>
            <input type="date" name="DateStarted" value="<?php echo $row['DateStarted']; ?>"><br>
            <label for="DateCompleted">Date Completed:</label><br>
            <input type="date" name="DateCompleted" value="<?php echo $row['DateCompleted']; ?>"><br>
            <input type="submit" value="Update Quiz">
        </form>
<?php
    } else {
        echo "ProgressID not found";
    }
} else {
    echo "Invalid Progress ID";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
