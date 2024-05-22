<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
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
            border-radius: 10px; 
        }

       

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 20px;
            color: black;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        input[type="option"] {
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

        input[type="submit"],
        input[type="button"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: white;
        }

        input[type="button"] {
            background-color: #007bff;
            color: white;
        }

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%;
        }

        select {
            width: calc(100% - 12px); /* Adjusted width */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none; /* Remove default arrow */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Custom arrow */
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 24px;
            cursor: pointer;
        }

        footer {
            background-color: darkred;
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
</head>
<body style="background-image: url('./img.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <h2 style=" 
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        ">Online Investment Training Platform System</h2>
    <div class="container">
        <h2 class="heading">Enrollment Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" id="user_id">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "online_investment_training_system";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT UserID, Username, Email FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['UserID'] . "'>" . $row['Username'] . " (" . $row['Email'] . ")</option>";
                        }
                    } else {
                        echo "<option value=''>No users available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="course_id">Select Course:</label>
                <select name="course_id" id="course_id">
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT CourseID,CourseName FROM courses";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['CourseID'] . "'>" . $row['CourseName'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No courses available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="enrollment_date">Enrollment Date:</label>
                <input type="date" name="enrollment_date" id="enrollment_date" required>
            </div>
            <div class="form-group">
                <label for="completion_status">Completion Status:</label>
                <input type="text" name="completion_status" id="completion_status" required>
            </div>
            <input type="submit" name="send" value="Enroll">
            <input type="button" value="Cancel" onclick="window.location.href=''">
        </form>
    </div>

    <?php
    include('db_connection.php');

    if(isset($_POST['send'])) {
        $firstname = $_POST['user_id'];
        $lastname = $_POST['course_id'];
        $email = $_POST['enrollment_date'];
        $hireddate = $_POST['completion_status']; 

        $stmt = $conn->prepare("INSERT INTO enrollments (UserID, CourseID, EnrollmentDate, CompletionStatus) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hireddate);

        if ($stmt->execute()) {
            echo "<script>alert('Enrollment successful.'); window.location.href = '#?id=$user_id';</script>"; 
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
    }

    $conn->close();
    ?>

    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
