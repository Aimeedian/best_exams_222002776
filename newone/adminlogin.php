<!DOCTYPE html>
<html lang="en">
<head>
    <!--NAYITURIKI LOUISE-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <style>
        /* Basic styling for the navigation bar */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
                body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: transparent;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: blue;
            border:2px solid red;

        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 25px;
            font-weight: initial;
            font-family: Arial, sans-serif;
        }
        input[type="email"], input[type="date"],input[type="password"],  select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            margin: 40px;
            width: 200px;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 16px;
        }
          input[type="reset"] {
            margin: 40px;
            width: 200px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a{
            background-color: indigo;
            color: white;
            font-size: 20px;
            font-family: initial;
            text-decoration: none;
        }
    </style>
</head>
<body>
<script>
    // JavaScript for navigation bar dropdown menu
    function toggleMenu() {
        var navbar = document.getElementById("navbar");
        if (navbar.className === "navbar") {
            navbar.className += " responsive";
        } else {
            navbar.className = "navbar";
        }
    }
</script>
<center>

</header>
<body style="background-image: url('./admin.jpg');
background-repeat: no-repeat;background-size: cover;">
    <div class="container">
    <p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>Online Investment Trainning Planning Platform</i></p>
   <p style="font-family: Arial, sans-serif;font-size: 35px;color: deeppink;"><i>Admin Login Form</i></p>
        <form action="login2.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="attendance_id" name="email" required>
            <label for="student_id">Password:</label>
            <input type="password" id="student_id" name="password" required>
            <input type="submit" value="Login">
            <input type="reset" value="Cancel">
        </form>
        
    </div>

</body>
</html>