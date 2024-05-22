
<?php  
//php file contain database connection
$servername="localhost";
$username="root";
$password="";
$dbname="online_investment_training_system";
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("connection failed.".$conn->connect_error);
}
$conn->select_db($dbname);
?>
