<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM survey WHERE id_survey = $id";
$result= $conn->query($query);
$survey = mysqli_fetch_assoc($result);
$query1 = "SELECT * FROM n_question WHERE id_survey = $id";
$query2 = "SELECT * FROM cb_question WHERE id_survey = $id";
$query3 = "SELECT * FROM rb_question WHERE id_survey = $id";

$n = $conn->query($query1);
$cb = $conn->query($query2);
$rb = $conn->query($query3);

  $id_ans;
	$sum1 = "SELECT MAX(id_ans_n) as sum FROM n_answer WHERE id_survey = $id";
  $sum2 = "SELECT MAX(id_ans_cb) as sum FROM cb_answer WHERE id_survey = $id";
  $sum3 = "SELECT MAX(id_ans_rb) as sum FROM rb_answer WHERE id_survey = $id";
    $re1 = $conn->query($sum1);
    $sum_ans1 = mysqli_fetch_assoc($re1);
        $re2 = $conn->query($sum2);
    $sum_ans2 = mysqli_fetch_assoc($re2);
        $re3 = $conn->query($sum3);
    $sum_ans3 = mysqli_fetch_assoc($re3);
    if($sum_ans1['sum']!=0){
    $id_ans = $sum_ans1['sum'];
    }
    else if($sum_ans2['sum']!=0){
    $id_ans = $sum_ans2['sum'];
    }else if($sum_ans3['sum']!=0){
    $id_ans = $sum_ans3['sum'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thống kê</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <a href="Trangchu-2.php">Quay về trang chủ</a>
	<h1><?php echo $survey['survey'] ?></h1>
	<br>
<table class="table">
	<thead>
    <tr>
      <th scope="col">#</th>
      <?php
      if($rb->num_rows >0){
        while ($row1 = mysqli_fetch_assoc($rb)){
        	echo "<th scope='col'>".$row1['rb_question']."</th>";
        }
        }
      ?>
      <?php
      if($cb->num_rows >0){
        while ($row2 = mysqli_fetch_assoc($cb)){
        	echo "<th scope='col'>".$row2['cb_question']."</th>";
        }
        }
      ?>
      <?php
      if($n->num_rows >0){
        while ($row3 = mysqli_fetch_assoc($n)){
        	echo "<th scope='col'>".$row3['n_question']."</th>";
        }
        }
      ?>
    </tr>
  </thead>
  <tbody>
    
    	<?php
    	for($i=1;$i<=$id_ans;$i++){

$num1 = "SELECT * FROM n_answer WHERE id_survey = $id AND id_ans_n = $i";
$num2 = "SELECT * FROM rb_answer WHERE id_survey = $id AND id_ans_rb = $i";
$num3 = "SELECT * FROM cb_answer WHERE id_survey = $id AND id_ans_cb = $i";
$result1 = $conn->query($num1);
$result2 = $conn->query($num2);
$result3 = $conn->query($num3);

        echo "<tr>";
      	echo "<th scope='row'>".$i."</th>";
      	while ($row4 = mysqli_fetch_assoc($result2)){
        	echo "<td>".$row4['answer_rb']."</td>";
        }while ($row5 = mysqli_fetch_assoc($result3)){
        	echo "<td>".$row5['answer_cb']."</td>";
        }
      	if($result1->num_rows >0){
      while ($row6 = mysqli_fetch_assoc($result1)){
        	echo "<td>".$row6['answer_n']."</td>";
        }
    }

  }
      echo "</tr>";
      ?>
    
  </tbody>
</table>
</body>
</html>