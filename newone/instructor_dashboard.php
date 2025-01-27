<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styling for header */
        header {
            background-color: darkred;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Basic styling for navigation */
        nav {
            background-color: #f4f4f4;
            padding: 30px 20px;
            text-align: center; /* Center the buttons */
        }

        nav button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px 25px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            border-radius: 5px;
        }

        nav button:hover {
            background-color: #0056b3;
        }

        /* Basic styling for sections */
        section {
            padding: 20px;
            margin-top: 20px;
        }

        /* Basic styling for footer */
        footer {
            background-color: darkred;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        /* Add wallpaper */
        body {
            background-image: url('wallpaper.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            min-height: 100vh; /* Ensure footer stays at the bottom */
        }

        /* Styling for home link */
        .home-link {
            display: inline-block;
            background-color: blue;
            padding: 20px;
            color: white;
            font-size: 20px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .home-link:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Instructor Dashboard</h1>
    </header>
    <nav>
        <button onclick="location.href='resource_table.php'">Manage resource</button>
        <button onclick="location.href='certificate_table.php'">Manage User Certificate</button>
        <button onclick="location.href='progress_table.php'">View User Progress</button>
        <button onclick="location.href='enrollment_table.php'">View User Progress</button>
       
        <button onclick="location.href='logout.php'">Logout</button>
    </nav>
    <center><a href="home.html" class="home-link">Home</a></center>
    <footer>
        <p>Designed by Aimee Diane KUBWIMANA_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
