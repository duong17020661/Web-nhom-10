<?php
	// you have already learned about session
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
if(mysqli_connect_error())
{
	echo "<p>Error in connection to database.</p>";
	exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["logout"]))
	{
    			// below code is used to destroy all the session
		session_destroy();
    			// below code is used to redirect users to codescracker.php page
		header("location: DangNhap.php");
    			// below code is used to skip executing the remaining code
    			// after this
		exit();
	}
	$username = $password = "";
	$username = $_POST["username"];
	$username = filter_login_input($username);
	$password = $_POST["password"];
	$password1 = md5($password);
	$password = filter_login_input($password1);
	$qry = "select * from user where username='$username' and password='$password'";
	$res = $conn->query($qry);
	if(mysqli_num_rows($res)>0)
	{
		$_SESSION['login'] = $username;
	}
	else
	{
		$loginCheck = "No";
	}
}
function filter_login_input($loginData)
{
	$loginData = trim($loginData);
	$loginData = stripslashes($loginData);
	$loginData = htmlspecialchars($loginData);
	return $loginData;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/DangNhap.css">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
    body {
      background-image: url('images/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
    </style>
</head>
<body >
	<?php
	if(isset($_SESSION['login']))
	{
		header("location: TrangChu.php");
		exit();
	}
	?>
	<div class = "container">
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
			<!-- Menu -->

			<h5 class="my-0 mr-md-auto font-weight-normal">Hỏi đáp trực tuyến</h5>
			<nav class="my-2 my-md-0 mr-md-3" style="border-right:solid 1px black;padding-right:30px">
				<a class="p-2 text-dark" href="#">Trang chủ</a>
				<a class="p-2 text-dark" href="#">Quản lý</a>
			</nav>
			<button type="button" class="btn btn-outline-primary"><a  href="DangKy.php">Đăng ký</a></button>
		</div>
	</div>
</div>
<div class="header" id="header1">
	<h1 class="text-center">HỆ THỐNG HỎI-ĐÁP</h1>
	<h1 class="text-center">TRƯỜNG ĐẠI HỌC CÔNG NGHỆ</h1>
</div>
<hr class="question">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default" style="border: 2px solid #ddd;background:#E6E6E6;">
			<div class="panel-heading text-center" >
				<h4>ĐĂNG NHẬP VỚI TÀI KHOẢN </h4>
				<h5>TRƯỜNG ĐẠI HỌC CÔNG NGHỆ HÀ NỘI</h5>
			</div>
			<form method="post" action="">
				<div class="panel-body form-signin">
					<input placeholder="Tên đăng nhập" class = "form-control" name="username" type="text">
					<input placeholder="Mật khẩu" class="form-control" name="password" type="password">
					<div class="row">
					    <div class="col">
					      <?php
							if(isset($loginCheck))
							{
								echo '<script type="text/javascript">alert("Tài khoản hoặc mật khẩu chưa đúng!");</script>';
							}
							?>
							<a href="TrangChu.php"  >Truy cập không cần đăng nhập</a>
					    </div>
					    <div class="col-md-auto">
					    </div>
					    <div class="col col-lg-2">
					      <input type="submit" class="btn btn-success" value="ĐĂNG NHẬP" style="float:right">
					    </div>
					  </div>
				</div>
			</form>
		</div>
	</div>
</div>
<footer class="footer footer-qa" id="footer">

	<div class="footer-left">

		<h3 class="footer-links">Nhóm 10 <br> Bài tập Web </h3>

		<h4>Trường ĐHCN</h4>
	</div>

</footer>
</body>
</html>