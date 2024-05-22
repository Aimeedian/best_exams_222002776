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

        input[type="text"], textarea {
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

if(isset($_GET['QuizID']) && is_numeric($_GET['QuizID'])) {
    $QuizID = $_GET['QuizID'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $QuizTitle = $_POST['QuizTitle'];
        $Questions = $_POST['Questions'];
        $Answers = $_POST['Answers'];
        $CorrectAnswers = $_POST['CorrectAnswers'];

        $sql = "UPDATE quizzes SET QuizTitle='$QuizTitle', Questions='$Questions', Answers='$Answers', CorrectAnswers='$CorrectAnswers' WHERE QuizID=$QuizID";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
             header('Location: quiz_table.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM quizzes WHERE QuizID=$QuizID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form method="post" action="" onsubmit="return confirmUpdate();">
            <input type="hidden" name="QuizID" value="<?php echo $row['QuizID']; ?>">
            <label for="QuizTitle">Quiz Title:</label><br>
            <input type="text" name="QuizTitle" value="<?php echo $row['QuizTitle']; ?>"><br>
            <label for="Questions">Questions:</label><br>
            <textarea name="Questions"><?php echo $row['Questions']; ?></textarea><br>
            <label for="Answers">Answers:</label><br>
            <textarea name="Answers"><?php echo $row['Answers']; ?></textarea><br>
            <label for="CorrectAnswers">Correct Answers:</label><br>
            <textarea name="CorrectAnswers"><?php echo $row['CorrectAnswers']; ?></textarea><br>
            <input type="submit" value="Update Quiz">
        </form>
<?php
    } else {
        echo "Quiz not found";
    }
} else {
    echo "Invalid Quiz ID";
}
$conn->close();
?>
</body>
</html>
