<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body style="background-image: url();background-size:cover;background-position: center;">
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form action="xuly_dangky.php" method="POST">
					<h2><img src="dhcn.jpg">&nbsp&nbsp&nbspĐăng ký tài khoản</h2>
					<div class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" class="form-control" placeholder="Tên đăng nhập của bạn" required name="txtUsername">
					</div>
					<div class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" placeholder="Mật khẩu của bạn" required name="txtPassword">
					</div>
					<div class="form-group">
						<label>Nhập lại mật khẩu</label>
						<input type="password" class="form-control" placeholder="Nhập lại mật khẩu của bạn" required
							name="txtRePassword">
					</div>
					
					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label>Tên</label>
								<input type="text" class="form-control" placeholder="Tên của bạn" required name="txtFirstname">
							</div>
							<div class="col">
								<label>Họ</label>
								<input type="text" class="form-control" placeholder="Họ của bạn" required name="txtLastname">
							</div>
						</div>
					</div>
					<div class="form-row align-items-center">
						<label style="width: 20%">&nbspNgày sinh: </label>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="txtBirthday1" style="width: 25%">
							<option selected>Ngày</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="txtBirthday2" style="width: 25%">
							<option selected>Tháng</option>
							<option value="1">Tháng 1</option>
							<option value="2">Tháng 2</option>
							<option value="3">Tháng 3</option>
							<option value="4">Tháng 4</option>
						</select>
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="txtBirthday3" style="width: 25%">
							<option selected>Năm</option>
							<option value="1">1999</option>
							<option value="2">2000</option>
							<option value="3">2001</option>
							<option value="4">2002</option>
							<option value="5">2003</option>
							<option value="6">2004</option>
						</select>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Email của bạn" required name="txtEmail">
					</div>
					<div class="form-group">
						<label>Giới tính</label>
						<div class="row" data-toggle="buttons">
							<div class="col">
								<label class="btn btn-outline-secondary">Nam
									<input type="radio" name="txtGender" value="Nam">
								</label>
							</div>
							<div class="col">
								<label class="btn btn-outline-secondary">Nữ
									<input type="radio" name="txtGender" value="Nữ">
								</label>
							</div>
							<div class="col">
								<label class="btn btn-outline-secondary">Khác
									<input type="radio" name="txtGender" value="Khác">
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="checkbox" required name="">
						<label>Tôi đồng ý điều khoản sử dụng</label>
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit" name="signup">Đăng ký</button>
					</div>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>

	<!-- Load jquery trước khi load bootstrap js -->
	<script src="jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>