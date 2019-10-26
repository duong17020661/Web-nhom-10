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
	$user = $_SESSION['login'];
	$time = date("Y/m/d");
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
	$res1 = mysqli_query($conn, "SELECT id_topic FROM topic");
	if($res1->num_rows >0){
		while ($row = mysqli_fetch_assoc($res1)){
			$id = $row['id_topic'];
			$remove = $row['id_topic']."rm";
			$edit = $row['id_topic']."edit";
			if(isset($_POST["$remove"])){
				$res2 = mysqli_query($conn, "DELETE FROM topic WHERE id_topic = $id");
				if($res2)
				{
					header("Location: http://localhost/Web-nhom-10/php/TrangChu.php");
				}
				else{
					echo"<p>Fail.$connect->error.</p>";
				}
			}
		}
	}


}
?>