<?php session_start(); ?>
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
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$topic = $_POST["topic"];
	$detail = $_POST["detail"];
	$user = $_SESSION['login'];
	$time = date("Y-m-d");
	if(isset($_POST["create"])){
		$qry = "insert into topic (topic,detail,user,time) values('$topic', '$detail','$user','$time');";
		$res = $conn->query($qry);
		if($res)
		{
			header("Location: http://localhost/Web-nhom-10/php/TrangChu.php");
		}
		else{
			echo"<p>Fail.$conn->error.</p>";
		}
	}


}
?>