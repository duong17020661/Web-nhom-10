<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <title>Thêm câu hỏi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /*căn trái cho lable và button chấp nhận*/
    label {
      float: left;
      width: 100px;
      font-weight: bold;
    }
    .container {
     align:center;
     width:600px;
     height:500px;
   }
 </style>
 <script>
        //load trang tạo câu hỏi
        function taocauhoi(){
          var addtopic = window.close("ThemTopic.php", "Google", "width=700px,height=500px");
        };
      </script>
    </head>

    <body class="text-center">
      <div class="container">
        <div class="shadow p-3 mb-5 bg-white rounded">
          <div class="card" style="align:center" >
           <div class="card-body">
            <form method="post" action="">
             <br>
             <div class="form-group">
              <label for="comment">Chủ đề:</label>
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
                
                    $id = mysqli_real_escape_string($conn, $_GET['id']);
                    echo $id; 
                      
                      $res2 = mysqli_query($conn, "SELECT * FROM topic WHERE id_topic = '$id'");
                      $row1 = mysqli_fetch_assoc($res2);
                          echo"<textarea name='id' style='display:none;'>".$row1['id_topic']."</textarea>";
                          echo"<textarea class='form-control' style='height:50px' id='comment' required name='topic'>".$row1['topic']."</textarea>";
                          echo"</div>";
                          echo"<br>";
                          echo"<br>";
                          echo"<div class='form-group'>";
                          echo"<label for='comment'>Chi tiết:</label>";
                          echo"<textarea class='form-control' style='height:150px' id='comment' required name='detail'>".$row1['detail']."</textarea>";
                                 if($_SERVER["REQUEST_METHOD"] == "POST")
              { 
                  $topic = $_POST["topic"];
                  $detail = $_POST["detail"];
                  if(isset($_POST["edit"])){
                    $res3 = mysqli_query($conn, "UPDATE topic SET topic = '$topic',detail = '$detail' WHERE id_topic = $id");
                    if($res3)
                    {
                      header("Location: http://localhost/Web-nhom-10/php/TrangChu.php");
                    }
                    else{
                      echo"<p>Fail.$conn->error.</p>";
                    }
                  }
                

              }

              
              ?>
            </div>
            <br><br>
            <div class="button"style="align:center">
              <input class="btn btn-primary" type="submit" onclick="taocauhoi()" value="Chấp nhận" style="width:100px" name="edit">&nbsp
              <input class="btn btn-primary" type="button" onclick="taocauhoi()" value="Hủy bỏ" style="width:100px">
            </div>
            <br>
          </form>
        </div>
      </div>

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