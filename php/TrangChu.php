<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<title> Q&A </title>
	<meta name="description" content="Hỏi đáp trực tuyến" />
	<meta name="keyword" content="q&a,hoi dap" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="hoidap.css" />
	 
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<style>
		.card .row {
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .card .row .card-body-right .card-title {
            color: #ff0000;
            font-weight: bold;
        }

        .card-header,
        .card-header .selectpicker {
            background: linear-gradient(#99ccff, #b3ffff);
        }

        /**/
        .card-header .selectpicker {
            font-weight: bold;
        }

        .card-header .selectpicker option {
            font-weight: bold;
        }

        .card-header .selectpicker {
            width: 250px;
            height: 35px;

        }
		/*khung tìm kiếm*/
        .has-search .form-control {
            padding-left: 2.375rem;
            width: 250px;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        /**/
        .list-question .title {
            font-weight: bold;
            color: #ff0000;
        }
        .list-question{
            font-size: 12px;
        }
        .list-question #question-item{
            max-height: 100px;
        }
		/*nút tạo câu hỏi*/
        #taocauhoi {
            border-radius: 4px;
            background-color: #4d79ff;
            
            color: white;
        }
    </style>
	<script>
        //load trang tạo câu hỏi
        function taocauhoi(){
            var addtopic = window.open("ThemTopic.html", "Google", "width=700px,height=500px");  
        };
    </script>
</head>


<body>
	<div class="container">
		<div id="menu">
			<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">	<!-- Menu -->

				<h5 class="my-0 mr-md-auto font-weight-normal">Hỏi đáp trực tuyến</h5>
				<nav class="my-2 my-md-0 mr-md-3" style="border-right:solid 1px black;padding-right:30px"> 
					<a class="p-2 text-dark" href="#">Trang chủ</a>
					<a class="p-2 text-dark" href="#">Quản lý</a>
				</nav>
					
				<div class="dropdown"> <!-- Drop down -->
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="background-color:#e3f2fd;margin-right:60px;margin-left:60px;">
						<img src="user.png" height="20px" width="auto" />
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form method="GET" action="DangNhap.php">
                            <a class="dropdown-item" href="#"><img src="user.png" height="20px" width="auto" />&nbsp <?php echo $_SESSION['login'] ?></a>
                            <a class="dropdown-item" href="#"><img src="Info.png" height="20px" width="auto" />&nbsp Cập nhật thông tin</a>
                            <hr></hr>
                         </form>
                        <form method="POST" action="DangNhap.php">
                            <a class="dropdown-item" href="DangNhap.php"><input type="submit" class="btn btn-success" name="logout" value="ĐĂNG XUẤT"></a>
                        </form>
					</div>
				</div>
			</div>
		</div>
		<div class="shadow p-3 mb-5 bg-white rounded" style="margin-bottom:70px;"><!-- Main -->
			<!--Phần danh sách câu hỏi-->
            <div class="card" id="question">
                <!--phần head-->
                <nav class="navbar" style="background-color:#00ffff">
                    <div>
                        <h4 class="my-0 mr-md-auto font-weight-normal"><img src="question.png" height="40px"
                                width="auto" /> Danh sách các câu hỏi</h5>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh sách các câu hỏi
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Câu hỏi dạng thường</a>
                            <a class="dropdown-item" href="#">Câu hỏi dạng radiobox</a>
                            <a class="dropdown-item" href="#">Câu hỏi dạng checkbox</a>
                        </div>
                    </div>
                </nav>
                <!--phần body-->
                <div class="card-body" id="question-body" style="background-color: #f2f2f2;">
					<div class="row justify-content-between">
						<div class="col-4">
							<div style="float:left">
								<button id="taocauhoi" class="btn" onclick="taocauhoi();">Tạo câu hỏi </button>
							</div>
						</div>
                    <br>
						<div class="col-4">
							<div class="search form-group has-search" style="float:right">	
								<span class="fa fa-search form-control-feedback"></span>
								<input type="text" class="form-control" placeholder="Search">
							</div>
						</div>
					</div>
                    <div class="list-question">
                        <div class="card" id="question-item">
                            <div class="card-body">
                                <a href="ThaoLuan.html" class="title">Đã bạn nào sắp tốt nghiệp chưa?</a><br>
                                <a href="#" class="trangthaicauhoi">Chưa có câu trả lời</a><br>
                                <p>
                                    Đăng bởi:
                                    <a href="">Nguyễn Văn Đình</a>
                                    &emsp;Số câu trả lời: 0
                                    &emsp;Lượt thích: 0
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card" id="question-item">
                            <div class="card-body">
                                <a href="ThaoLuan.html" class="title">Đã bạn nào sắp tốt nghiệp chưa?</a><br>
                                <a href="#" class="trangthaicauhoi">Chưa có câu trả lời</a><br>
                                <p>
                                    Đăng bởi:
                                    <a href="">Nguyễn Văn Đình</a>
                                    &emsp;Số câu trả lời: 0
                                    &emsp;Lượt thích: 0
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<div  class="text-center"> <!-- Footer -->
		<a href="Trangchu.html#menu" style="border-radius: 75%;position:fixed;right:10%"><img src="btt.png" height="40px" width="auto" /></a>
		<footer class="pt-4 my-md-5 pt-md-5 border-top">
			<div class="row">
				<div class="col-12 col-md">
					<img class="mb-2" src="footer.png" alt="" width="24" height="24">
					<small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
				</div>
			</div>
		</footer>
		</div>
	</div>

</body>

</html>