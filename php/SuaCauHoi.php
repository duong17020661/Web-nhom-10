<?php session_start(); ?>
<!DOCTYPE html>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
?>
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
                                    if($_SERVER["REQUEST_METHOD"] == "POST")
                                    {

                                      $res1 = mysqli_query($conn, "SELECT id_question FROM question");
                                      if($res1->num_rows >0){
                                        while ($row = mysqli_fetch_assoc($res1)){
                                          $question_id = $row['id_question'];
                                          $edit = $row['id_question']."edit";
                                          if(isset($_POST["$edit"])){

                                            $res2 = mysqli_query($conn, "SELECT * FROM question WHERE id_question = $question_id");

                                            if($res2->num_rows >0){
                                              while ($row1 = mysqli_fetch_assoc($res2)){
                                                echo"<textarea name='id' style='display:none;'>".$row1['id_question']."</textarea>";
                                                echo"<textarea class='form-control' style='height:50px' id='comment' required name='question'>".$row1['question']."</textarea>";
                                                echo"</div>";
                                                echo"<br>";
                                                echo"<br>";
                                                echo"<div class='form-group'>";
                                                echo"<label for='comment'>Chi tiết:</label>";
                                                echo"<textarea class='form-control' style='height:150px' id='comment' required name='detail'>".$row1['detail']."</textarea>";
                                              }
                                            }

                                          }
                                              }

                                        }

                                        $question_id = $_POST["id"];
                                        $question = $_POST["question"];
                                        $detail = $_POST["detail"];
                                        if(isset($_POST["edit"])){
                                          $res3 = mysqli_query($conn, "UPDATE question SET question = '$question',detail = '$detail' WHERE id_question = $question_id");
                                          if($res3)
                                          {
                                            header("Location: http://localhost/Web-nhom-10/php/ThaoLuan.php?id=$id");
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
                      <input class="btn btn-primary" type="submit" value="Chấp nhận" style="width:100px" name="edit">&nbsp
                      <input class="btn btn-primary" type="button" value="Hủy bỏ" style="width:100px">
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