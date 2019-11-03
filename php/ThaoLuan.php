<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Thảo luận</title>
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
            var addtopic = window.open("ThemTopic.php", "Google", "width=700px,height=500px");
        };
        function home(){
                window.location.href='http://localhost/Web-nhom-10/php/TrangChu.php';
        };
    </script>
</head>

<body>
    <div class="container">
        <div id="menu">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <!-- Menu -->

                <h5 onClick=home() class="my-0 mr-md-auto font-weight-normal">Hỏi đáp trực tuyến</h5>
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
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM topic WHERE id_topic = $id";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
	$question = $_POST["question"];
	$id_topic = $id;
	$detail = $_POST["detail"];
	$user = $_SESSION['login'];
	$time = date("Y-m-d");
	if(isset($_POST["create"])){
		$qry = "insert into question (question,detail,user,time,id_topic) values('$question', '$detail','$user','$time','$id_topic');";
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

$res1 = mysqli_query($conn, "SELECT id_question FROM question");
	if($res1->num_rows >0){
		while ($row = mysqli_fetch_assoc($res1)){
			$question_id = $row['id_question'];
			$remove = $row['id_question']."rm";
			$edit = $row['id_question']."edit";
			if(isset($_POST["$remove"])){
				$res2 = mysqli_query($conn, "DELETE FROM question WHERE id_question = $question_id");
				if($res2)
				{

				}
				else{
					echo"<p>Fail.$connect->error.</p>";
				}
			}
		}
	}
?>

        <div class="shadow p-3 mb-5 bg-white rounded" width="">
            <div class="row">
                <div class="col-md-3">
                    <img src="images/q-and-a.jpg" class="card-img d-none d-md-block d-lg-block d-xl-block" alt="Q and A"
                        height="150px" width="auto">
                </div>
                <div class="col-md-9">
                    <div class="card-body-right">
                        <p class="card-title">
                            <img src="images/icon-lock.png" alt="" width="20" height="20">
                            <?php echo $post['topic']; ?>
                        </p>
                        <p class="card-text">
                            <img src="images/mo-ta.jpg" alt="" width="15" height="15">
                            Mô tả: <?php echo $post['detail']; ?><br>
                            <img src="images/dang-boi.png" alt="" width="15" height="15">
                            Đăng bởi: <a href=""><?php echo $post['user']; ?></a>
                        </p>
                        <p class="card-text">
                            <img src="images/thoi-gian.jpg" width="15" height="15" alt="">
                            Thời gian tạo:
                            <a href="#" class=""><?php echo $post['time']; ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-bottom:70px;">
            <!-- Main -->
            <!--Phần danh sách câu hỏi-->
            <div class="card" id="question">
                <!--phần head-->
                <nav class="navbar" style="background-color:#00ffff">
                    <div>
                        <h4 class="my-0 mr-md-auto font-weight-normal"><img src="images/question.png" height="40px"
                                width="auto" /> Danh sách các câu hỏi</h4>
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
								<button id="taocauhoi" type="button" class="btn btn-info"><a  href="http://localhost/Web-nhom-10/php/TaoCauHoi.php?id=<?php echo $id?>" style="color:white;">Tạo câu hỏi</a></button>
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
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');

$result = mysqli_query($conn, 'select count(id_question) as total from question');
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
$query = "SELECT * FROM question WHERE id_topic = $id LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

?>
                    <div>
                        <?php

                        if($result->num_rows >0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $remove = $row['id_question']."rm";
                                $edit = $row['id_question']."edit";
                                echo"<div class='list-question'>";
                    echo"<div class='card' id='question-item'>";
                    echo"<div class='card-body'>";
                    echo"<div class='row'>";
                    echo"<div class='col-8'>";
                    echo"<a href='http://localhost/Web-nhom-10/php/CauHoi.php?ques=".$row['id_question']."' class='title'>".$row['question']."</a><br>";
                    echo"<a href='#' class='trangthaicauhoi'>".$row['detail']."</a><br>";
                    echo"<p>";
                    echo"Đăng bởi:";
                    echo"<a href=''>".$row['user']."</a>";
                    echo"&emsp;Ngày đăng: ".$row['time']."";
                    echo"&emsp;<a href='' onClick='xoa(".$row['id_question'].")'>Xóa</a>";
                    echo"&emsp;<a href='http://localhost/Web-nhom-10/php/SuaCauHoi.php?id=".$row['id_question']."'>Sửa</a>";
                    echo"&emsp;Lượt thích: 0";
                    echo"</p>";
                    echo"</div>";
                    ?>
                    <script>
                  
                    function xoa(id){
                        if(confirm("Bạn có chắc chắn muốn xóa")){
                            window.location.href= 'http://localhost/Web-nhom-10/php/xoaCauHoi.php?id='+id;
                            return true;
                        }
                    };
                    </script>
                    <?php
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                    echo"<br>";
                            }
                        }
                        else{
                        echo"<p>Fail.$conn->error.</p>";
                        }
                        ?>
                    </div>
            <div class="pagination">
            <?php
            if ($current_page > 1 && $total_page > 1){
             echo '<a href="ThaoLuan.php?id='.$id.'&page='.($current_page-1).'">Prev</a> | ';
         }
                     // Lặp khoảng giữa
         for ($i = 1; $i <= $total_page; $i++){
                         // Nếu là trang hiện tại thì hiển thị thẻ span
                         // ngược lại hiển thị thẻ a
             if ($i == $current_page){
                 echo '<span>'.$i.'</span> | ';
             }
             else{
                 echo '<a href="ThaoLuan.php?id='.$id.'&page='.$i.'">'.$i.'</a> | ';
             }
         }

                     // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev

         ?>
         </div>

        <div class="text-center">
            <!-- Footer -->
            <a href="Trangchu.html#menu" style="border-radius: 75%;position:fixed;right:10%"><img src="btt.png"
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