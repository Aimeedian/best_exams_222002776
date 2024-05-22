
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.login-container {
    width: 300px;
    padding: 20px;
    background-color: #fff;
    margin: 100px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #5cb85c;
    border: none;
    color: white;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}

.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}

    </style>
</head>
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>Online Investment Trainning Planning Platform</i></p></center>
<body style="background-image: url('./tr.jpeg');
background-repeat: no-repeat;background-size: cover;">
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="inst.php">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
