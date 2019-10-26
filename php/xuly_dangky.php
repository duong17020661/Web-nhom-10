<?php
	// below code checks whether the form is submitted
	// using the POST method or not
if($_SERVER["REQUEST_METHOD"] == "POST")
{
		// the form is submitted using the POST method
		// now proceed to process the form's data
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "q_a";
	$conn = mysqli_connect($server, $user, $pass, $database);
	if(mysqli_connect_error())
	{
		echo "<p>Error occurred..kindly try again later.</p>";
		echo "<p>Exiting...</p>";
		exit();
	}

	$username = $_POST["txtUsername"];
	$password_1 = $_POST["txtPassword"];
	$email = $_POST["txtEmail"];
	$first_name = $_POST["txtFirstname"];
	$last_name = $_POST["txtLastname"];
	$gender = $_POST["txtGender"];
	$birthday_1 = $_POST["txtBirthday1"];
	$birthday_2 = $_POST["txtBirthday2"];
	$birthday_3 = $_POST["txtBirthday3"];
}
?>
<html>
<head>
	<title>PHP and MySQLi Registering the User</title>
</head>
<body>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$link_address = 'DangNhap.php';
		$password = md5($password_1);
		$birthday = $birthday_1."-".$birthday_2."-".$birthday_3;
		$qry = "insert into user (username, password, email, last_name, first_name, gender, birthday)
		values('$username', '$password', '$email','$last_name', '$first_name', '$gender', '$birthday');";
		$res = $conn->query($qry);
		if($res)
		{
			echo "<p>You are successfully registered to codescracker.com</p>";
			echo "<p>Your Username: <b>".$username."</b></p>";
			echo "<p>Your Password: <b>".$password."</b></p>";
			echo "<a href='".$link_address."'>Đăng nhập ngay</a>";
			exit();
		}
		else
		{
			echo "<p>Error occurred, kindly try again later.</p>";
			exit();
		}
	}
	?>
</body>
</html>