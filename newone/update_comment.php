<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Comment</title>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_investment_training_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['CommentID']) && is_numeric($_GET['CommentID'])) {
    $CommentID = $_GET['CommentID'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $CommentText = $_POST['CommentText'];
        $CommentDate = $_POST['CommentDate'];

        $sql = "UPDATE comments SET CommentText='$CommentText', CommentDate='$CommentDate' WHERE CommentID=$CommentID";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: comment_table.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM comments WHERE CommentID=$CommentID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form method="post" action="" onsubmit="return confirmUpdate();">
            <input type="hidden" name="CommentID" value="<?php echo $row['CommentID']; ?>">
            <label for="CommentText">Comment Text:</label><br>
            <textarea name="CommentText"><?php echo $row['CommentText']; ?></textarea><br>
            <label for="CommentDate">Comment Date:</label><br>
            <input type="date" name="CommentDate" value="<?php echo $row['CommentDate']; ?>"><br>
            <input type="submit" value="Update Comment">
        </form>
<?php
    } else {
        echo "Comment not found";
    }
} else {
    echo "Invalid Comment ID";
}
$conn->close();
?>
</body>
</html>
