<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes Form</title>
    <style>
       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;

        }

        .container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid red;
            background-color: yellow;
            border-radius: 10px; /* Added border radius */
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 20px;
            color: black; /* Corrected color */
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="date"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="email"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
         input[type="radio"] {
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="option"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            background-color:#dc3545 ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="button"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%; /* Adjusted margin */
        }

        footer {
            background-color:darkred;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 25px;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
    </style>
   <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<body>
    <h2 class="heading"><i>Online Investment Training Platform System</i></h2>
    <div class="container">
        <h2 class="heading"><i>Quizzes Form</i></h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return confirmInsert()">
            <div class="form-group">
                <label for="user_id">Select Course:</label>
                <select name="user_id" id="user_id">
                    <?php
                  include('db_connection.php');

                    $sql = "SELECT CourseID, CourseName FROM courses"; // Fixed SQL query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>"; // Fixed column names
                        }
                    } else {
                        echo "<option value=''>No courses available</option>"; // Fixed error message
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="qt">Quiz Title</label>
                <input type="text" name="qt" id="qt" required>
            </div>
            <div class="form-group">
                <label for="qn">Question</label>
                <input type="text" name="qn" id="qn" required>
            </div>
            <div class="form-group">
                <label for="ans">Answers</label>
                <input type="text" name="ans" id="ans" required>
            </div>
            <div class="form-group">
                <label for="ca">Correct Answer</label>
                <input type="text" name="ca" id="ca" required>
            </div>
            <div class="form-group">
                <label for="mark">Mark</label>
                <input type="number" name="mark" id="mark" required>
            </div>
            <input type="submit" name="send" value="Sign Up">
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
       include('db_connection.php');

        $cid = $_POST['cid'];
        $qt = $_POST['qt'];
        $qn = $_POST['qn'];
        $ans = $_POST['ans'];
        $ca = $_POST['ca'];
        $m = $_POST['mark'];

        $stmt = $conn->prepare("INSERT INTO quizzes (CourseID, QuizTitle, Questions, Answers, CorrectAnswers, Mark) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssss", $cid, $qt, $qn, $ans, $ca, $m);

        if ($stmt->execute()) {
            echo "<script>alert('Quiz added successfully.'); window.location.href = '#';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
