<?php session_start(); ?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id_question = mysqli_real_escape_string($conn, $_GET['ques']);
echo "aa";
echo $id_question;
$query = "SELECT * FROM question WHERE id_question = $id_question";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
	$answer = $_POST["answer"];
	$user = $_SESSION['login'];
	$time = getdate(date("U"));
	if(isset($_POST["create"])){
		$qry = "insert into answer (answer,user,time,id_question) values('$answer','$user','$time','$id_question');";
		$res = $conn->query($qry);
		if($res)
		{
			echo"a";
		}
		else{
			echo"<p>Fail.$conn->error.</p>";
		}
	}
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Trang cá nhân</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        /*màu nền của card-body của phần danh sách câu hỏi*/
        #question #question-body{
            background-color: #f2f2f2;
        }

        /**/
        .list-question .title {
            font-weight: bold;
            color: #ff0000;
        }

        .list-question {
            font-size: 12px;
        }

        .list-question #question-item {
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
            location.replace("http://localhost/Web-nhom-10/php/ThaoLuan.php?id=<?php echo $post['id_topic']?>");
        };
    </script>
</head>

<body>
    <div class="container">
        <div id="menu">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <!-- Menu -->

                <h5 class="my-0 mr-md-auto font-weight-normal">Hỏi đáp trực tuyến</h5>
                <nav class="my-2 my-md-0 mr-md-3" style="border-right:solid 1px black;padding-right:30px">
                    <a class="p-2 text-dark" href="#">Trang chủ</a>
                    <a class="p-2 text-dark" href="#">Quản lý</a>
                </nav>

                <div class="dropdown">
                    <!-- Drop down -->
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="background-color:#e3f2fd;margin-right:60px;margin-left:60px;">
                        <img src="images/user.png" height="20px" width="auto" />
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form method="GET" action="DangNhap.php">
                                                    <a class="dropdown-item" href="#"><img src="images/user.png" height="20px" width="auto" />&nbsp <?php echo $_SESSION['login'] ?></a>
                                                    <a class="dropdown-item" href="#"><img src="images/Info.png" height="20px" width="auto" />&nbsp Cập nhật thông tin</a>
                                                    <hr></hr>
                                                </form>
                                                <form method="POST" action="DangNhap.php">
                                                    <a class="dropdown-item" href="DangNhap.php"><input type="submit" class="btn btn-success" name="logout" value="ĐĂNG XUẤT"></a>
                                                </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-bottom:70px;">
            <!-- Main -->
            <!--Phần danh sách câu hỏi-->
            <div class="card" id="question">
                <!--phần head-->
                <nav class="navbar" style="background-color:#00ffff">
                    <div>
                        <h4 class="my-0 mr-md-auto font-weight-normal">Đăng bởi: <?php echo $post['user']; ?> </h4>
						<p><?php echo $post['time']; ?></p>
                    </div>

                </nav>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');

$result = mysqli_query($conn, 'select count(id_answer) as total from answer');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_records / $limit);

if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM answer WHERE id_question = $id_question LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

?>
                <!--phần body-->
                <div class="card-body" id="question-body">
					<div class="row justify-content-between">
						<div class="col-4">
							<div style="float:left">
								<button id="taocauhoi" class="btn" onclick="taocauhoi();">< Trở về bảng câu hỏi</button>
							</div>
						</div>
					</div>
                    <div class="shadow p-3 mb-5 bg-white rounded"><!--câu hỏi -->
						<div class="media">
							<img src="images/avt.jpg" class="mr-3" alt="avatar" height="50px" width="auto">
							<div class="media-body">
								<h5 class="mt-0"><?php echo $post['question']; ?></h5>
								<?php echo $post['detail']; ?>
							</div>
						</div>
					</div>
					<?php
					if($result->num_rows >0){
                                                while ($row = mysqli_fetch_assoc($result)){
					echo"<div class='shadow p-3 mb-5 bg-white rounded'>";
						echo"<div class='media text-muted pt-3'>";
							echo"<svg class='bd-placeholder-img mr-2 rounded' width='32' height='32' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: 32x32'><title>Placeholder</title><rect width='100%' height='100%' fill='#007bff'/><text x='50%' y='50%' fill='#007bff' dy='.3em'>32x32</text></svg>";
								echo"<p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>";
									echo"<strong class='d-block text-gray-dark'>".$row['user']."</strong>";
									echo"".$row['answer']."";
								echo"</p>";
						echo"</div>";
                    echo"</div>";
                    }
                    }?>
					<div class="form-group"><!--điền câu trả lời -->
					    <form method='post'>
						<label for="exampleFormControlTextarea1">Trả lời</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="answer"></textarea>
						<br>
					    <input class="btn btn-primary" type="submit"  value="Trả lời" style="width:100px" name="create">
					    </form>
					</div>
                </div>
            </div>
        </div>
         <div class="pagination">
                    <?php
                    if ($current_page > 1 && $total_page > 1){
                     echo '<a href="CauHoi.php?ques='.$id_question.'&page='.($current_page-1).'">Prev</a> | ';
                 }
                             // Lặp khoảng giữa
                 for ($i = 1; $i <= $total_page; $i++){
                                 // Nếu là trang hiện tại thì hiển thị thẻ span
                                 // ngược lại hiển thị thẻ a
                     if ($i == $current_page){
                         echo '<span>'.$i.'</span> | ';
                     }
                     else{
                         echo '<a href="CauHoi.php?ques='.$id_question.'&page='.$i.'">'.$i.'</a> | ';
                     }
                 }

                             // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev

                 ?>
                 </div>
                 </div>
                 </div>
                 </div>
        <div class="text-center">
            <!-- Footer -->
            <a href="Trangchu.html#menu" style="border-radius: 75%;position:fixed;right:10%"><img src="images/btt.png"
                    height="40px" width="auto" /></a>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>