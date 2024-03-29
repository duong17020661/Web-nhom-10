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
                <form method="post" action="http://localhost/Web-nhom-10/php/ThaoLuan.php?id=<?php echo $id?>">
                   <br>
                   <div class="form-group">
                      <label for="comment">Chủ đề:</label>
                      <textarea class="form-control" style="height:50px" id="comment" required name="question"></textarea>
                  </div>
                  <br>
                  <br>
                  <div class="form-group">
                      <label for="comment">Chi tiết:</label>
                      <textarea class="form-control" style="height:150px" id="comment" required name="detail"></textarea>
                  </div>
                  <br><br>
                  <div class="button"style="align:center">
                      <input class="btn btn-primary" type="submit" value="Chấp nhận" style="width:100px" name="create">&nbsp
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