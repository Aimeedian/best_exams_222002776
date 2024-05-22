<?php
// PHP Code to Update Data in Database
include('db_connection.php');

if(isset($_GET['ResourceID']) && is_numeric($_GET['ResourceID'])) {
    $ResourceID = $_GET['ResourceID'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ResourceType = $_POST['ResourceType'];
        $ResourceTitle = $_POST['ResourceTitle'];
        $Description = $_POST['Description'];
        $URL = $_POST['URL'];
        $UploadDate = $_POST['UploadDate'];

        $sql = "UPDATE investment_planning_resources SET ResourceType='$ResourceType', ResourceTitle='$ResourceTitle', Description='$Description', URL='$URL', UploadDate='$UploadDate' WHERE ResourceID=$ResourceID";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: resource_table.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM investment_planning_resources WHERE ResourceID=$ResourceID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<head><title>update resources</title>
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
        label{
            font-size: 20px;
            color:#007bff;
            font-weight: bold;
        }

        input[type="text"], input[type="date"],textarea {
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
    </style></head>
        <form method="post" action="" onsubmit="return confirmUpdate();">
            <input type="hidden" name="ResourceID" value="<?php echo $row['ResourceID']; ?>">
            <label for="ResourceType">Resource Type:</label><br>
            <input type="text" name="ResourceType" value="<?php echo $row['ResourceType']; ?>"><br>
            <label for="ResourceTitle">Resource Title:</label><br>
            <input type="text" name="ResourceTitle" value="<?php echo $row['ResourceTitle']; ?>"><br>
            <label for="Description">Description:</label><br>
            <textarea name="Description"><?php echo $row['Description']; ?></textarea><br>
            <label for="URL">URL:</label><br>
            <input type="text" name="URL" value="<?php echo $row['URL']; ?>"><br>
            <label for="UploadDate">Upload Date:</label><br>
            <input type="date" name="UploadDate" value="<?php echo $row['UploadDate']; ?>"><br>
            <input type="submit" value="Update Resource">
        </form>
<?php
    } else {
        echo "Resource not found";
    }
} else {
    echo "Invalid Resource ID";
}
$conn->close();
?>
