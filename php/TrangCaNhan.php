<?php session_start(); ?>
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
        #question #question-body {
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

    </script>
</head>
<?php
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
    $user = $_SESSION['login'];
    $thongtin = mysqli_query($conn,"SELECT * FROM user WHERE username = '$user'");
    $row_thongtin = mysqli_fetch_assoc($thongtin);?>
<body>
    <div class="container">
        <div id="menu">
            <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <!-- Menu -->

            <a onClick=home() class="my-0 mr-md-auto font-weight-normal"><img src="images/logo.png" height="50px"></a>
            <nav class="my-2 my-md-0 mr-md-3" style="border-right:solid 1px black;padding-right:30px">
                <a class="p-2 text-dark" href="Trangchu.php">Trang chủ</a>
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
                <a class="dropdown-item" href="#"><img src="images/user.png" height="20px" width="auto" />&nbsp <?php echo $_SESSION['login'] ?></a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal"><img src="images/Info.png"
                    height="20px" width="auto" />&nbsp Cập nhật thông
                tin</a>
                <hr></hr>
                <form method="POST" action="DangNhap.php">
                    <a class="dropdown-item" href="DangNhap.php"><input type="submit" class="btn btn-success" name="logout" value="ĐĂNG XUẤT"></a>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<form method='POST'>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #00ffff">
                    <h3>Cập nhật thông tin</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="staticUser" class="col-sm-3 col-form-label">Tên đăng
                        nhập</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                            value="<?php echo $row_thongtin['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputhoten" class="col-sm-3 col-form-label">Họ và
                        tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputhoten" name="name"
                            value="<?php echo $row_thongtin['last_name']." ".$row_thongtin['first_name']; ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputemail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputemail" name="email"
                            value="<?php echo $row_thongtin['email']; ?>" />
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg" name="update" style="margin-left:85%" value="Cập nhật" />
                </div>
            </div>
        </div>
    </div>
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $full_name = $_POST["name"];
    $name = explode(" ", $full_name, 2 );
    $last_name = $name[0];
    $first_name = $name[1];
    $email = $_POST["email"];
    if(isset($_POST['update'])){
        $res3 = mysqli_query($conn, "UPDATE user SET last_name = '$last_name' ,first_name = '$first_name',email = '$email' WHERE username = '$user'");
  }
header("Location: http://localhost/Web-nhom-10/php/TrangCaNhan.php");
}
?>
<div class="shadow p-3 mb-5 bg-white rounded" width="">
    <div class="row">
        <div class="col-md-3">
            <img src="images/avt.jpg" class="card-img d-none d-md-block d-lg-block d-xl-block" width="150"
            height="210">
        </div>
        <div class="col-md-9">
            <div class="card-body-right">
                <b class="card-title">
                    <img src="user.png" alt="" width="20" height="20">
                    <front color="0000FF"><?php echo $row_thongtin['last_name']." ".$row_thongtin['first_name']; ?></front>
                </b>
                <p class="card-text">
                    <img src="images/mo-ta.jpg" alt="" width="15" height="15">
                    Chức vụ: Thành viên<br>
                    <img src="images/dang-boi.png" alt="" width="15" height="15">
                    Tổng số câu hỏi: 0<br>
                    <img src="images/dang-boi.png" alt="" width="15" height="15">
                    Câu hỏi chưa được trả lời: 0
                </p>
                <p class="card-text">
                    <img src="images/thoi-gian.jpg" width="15" height="15" alt="">
                    Lần cuối đặt câu hỏi: N/A
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
                    width="auto" />
                Danh sách các câu hỏi</h5>
            </div>

        </nav>
        <!--phần body-->
        <div class="card-body" id="question-body">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'q_a');

            $result = mysqli_query($conn, "SELECT COUNT(id_question) as total FROM question WHERE user = '$user'");
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
            $danhsach = mysqli_query($conn,"SELECT * FROM question WHERE user = '$user' LIMIT $start, $limit");
            ?>
            <div>
                <?php

                if($danhsach->num_rows >0){
                    while ($row = mysqli_fetch_assoc($danhsach)){
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
                        echo"&emsp;Số câu trả lời: 0";
                        echo"&emsp;Lượt thích: 0";
                        echo"</p>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"</div>";
                        echo"<br>";
                    }
                }
                else{
                    echo"";
                }
                ?>
            </div>
            <div class="pagination">
                <?php
                if ($current_page > 1 && $total_page > 1){
                   echo '<a href="TrangCaNhan.php?page='.($current_page-1).'">Prev</a> | ';
               }
                     // Lặp khoảng giữa
               for ($i = 1; $i <= $total_page; $i++){
                         // Nếu là trang hiện tại thì hiển thị thẻ span
                         // ngược lại hiển thị thẻ a
                   if ($i == $current_page){
                       echo '<span>'.$i.'</span> | ';
                   }
                   else{
                       echo '<a href="TrangCaNhan.php?&page='.$i.'">'.$i.'</a> | ';
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