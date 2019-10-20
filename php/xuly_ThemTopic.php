<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$server = "localhost";
		$user = "root";
		$pass = "";
		$database = "q_a";
		$conn = mysqli_connect($server, $user, $pass, $database);
		if(mysqli_connect_error())
		{
			die("Connection failed: " . $conn->connect_error);
			exit();
		}

		$topic = $_POST["topic"];
		$detail = $_POST["detail"];
		$qry = "insert into topic (topic,detail) values('$topic', '$detail');";
		$res = $conn->query($qry);
		if($res)
		{
			header("Location: http://localhost/Web-nhom-10/php/TrangChu.php");
		}
	}
?>