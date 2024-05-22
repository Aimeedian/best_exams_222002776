
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        input[type="tel"],
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
    <script>
    function validateForm() {
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        // Email validation
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address');
            return false;
        }

        // Phone number validation
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            alert('Please enter a valid 10-digit phone number');
            return false;
        }

        return true;
    }
</script>
</head>
<body style="background-image: url('./img.jpeg');
background-repeat: no-repeat;background-size: cover;">
<h2 class="heading"><i>Online Investment Training Platform System</i></h2>
<div class="container"> 
    <h2 class="heading"><i>Instructor Form</i></h2>
    <form action="" method="POST" onsubmit="return validateForm()">
    
        <div class="form-group">
            <label for="cname"> First Name:</label>
            <input type="text" name="nme" id="uname" required>
        </div>
         <div class="form-group">
            <label for="cname">Last Name</label>
            <input type="text" name="lnme" id="uname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required> <!-- Changed type to email -->
        </div>
         <div class="form-group">
            <label for="id">Telephone</label>
            <input type="tel" name="phone" id="id" required> <!-- Changed type to email -->
        </div>  
  
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="date" required> <!-- Changed type to email -->
        </div>
        <input type="submit" name="send" value="register">
        <input type="button" value="Cancel" onclick="window.location.href=''">
    </form>
</div>
<?php

    include('db_connection.php');

    // Check if the form is submitted
   if(isset($_POST['send'])) {
    // Retrieve values from form
    $firstname = $_POST['nme'];
    $lastname = $_POST['lnme'];
    $password=$_POST['email'];
    $email = $_POST['phone'];
    $telephone = $_POST['address'];
    // Insert new record into the database
    $stmt = $conn->prepare("INSERT INTO trainees (FirstName ,LastName ,Email ,Phone  ,Address ) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $firstname, $lastname, $password, $email, $telephone);

    if ($stmt->execute()) {
         // this message displayed after insert and location reach after insert
       echo "<script>alert('data are inserted successfully.'); window.location.href = 'trainees_table.php?id=$user_id';</script>"; 
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
?>

<footer>
    <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>



</body>
</html>
