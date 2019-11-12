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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Phiếu khảo sát</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h2><?php echo $survey['survey'] ?></h2><br></br>
                <hr>
                <?php
                $i=1;
                if($rb->num_rows >0){
                    while ($row1 = mysqli_fetch_assoc($rb)){
                    echo"<h5><u>Câu hỏi ".$i.":</u></h5>";
                    echo"<h5>".$row1['rb_question']."</h5><br>";
                    echo"<div class='row'>";
                    $ans1 = explode("/",$row1['all_answer_rb']);
                    for($j=0;$j<count($ans1);$j++){
                        echo"<div class='col-sm-3'><input type='radio' name="."rb".$row1['id_rb']." value='".$ans1[$j]."' />".$ans1[$j]."</div>";
                    }
                    echo"</div>";
                    echo"<hr>";
                    $i++;
                    }
                    
                }
                if($cb->num_rows >0){
                    while ($row2 = mysqli_fetch_assoc($cb)){
                    echo"<h5><u>Câu hỏi ".$i.":</u></h5>";
                    echo"<h5>".$row2['cb_question']."</h5><br>";
                    echo"<div class='row'>";
                    $ans2 = explode("/",$row2['all_answer_cb']);

                    for($j=0;$j<count($ans2);$j++){
                        echo"<div class='col-sm-3'><input type='checkbox' name="."cb".$row2['id_cb']."[]"." value='".$ans2[$j]."'  />".$ans2[$j]."</div>";
                    }
                    echo"</div>";
                    echo"<hr>";
                    $i++;
                    }
                    
                }
                if($n->num_rows >0){
                    while ($row3 = mysqli_fetch_assoc($n)){
                    echo"<h5><u>Câu hỏi ".$i.":</u></h5>";
                    echo"<h5>".$row3['n_question']."</h5><br>";
                    echo"<div class='row'>";
                    echo"<textarea class='form-control' name="."n".$row3['id_n']." rows='5'></textarea>";
                    echo"</div>";
                    echo"<hr>";
                    $i++;
                    }
                    
                }
                ?>
            </div>
        </div>
        <div class="col-sm-2"></div>
        <input type="submit" name="submit " class="btn btn-primary btn-lg" value="Hoàn thành" style="float:right;"/>
    </form>
    </div>
    </div>
</body>

</html>
<?php
    $sum = "SELECT MAX(id_ans_n) as sum FROM n_answer WHERE id_survey = $id";
    $re = $conn->query($sum);
    if($re->num_rows > 0){
    $sum_ans = mysqli_fetch_assoc($re);
        $id_ans = $sum_ans['sum']+1;
    }
    else{
        $id_ans = 1;
    }
    echo $id_ans;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = "SELECT id_n FROM n_question WHERE id_survey = $id";
        $num2 = "SELECT id_cb FROM cb_question WHERE id_survey = $id";
        $num3 = "SELECT id_rb FROM rb_question WHERE id_survey = $id";
        $result1 = $conn->query($num1);
        $result2 = $conn->query($num2);
        $result3 = $conn->query($num3);

/*-----CHECK-BOX-----*/
    while ($id_cb = mysqli_fetch_assoc($result2)){
        $i = $id_cb['id_cb'];
        $cb = $_POST['cb'.$i];
        $ans_cb = $cb[0]."/".$cb[1];
        $query = "INSERT INTO cb_answer (id_ans_cb,answer_cb,id_cb,id_survey) VALUES ('$id_ans','$ans_cb','$i','$id');";
        $res = $conn->query($query);
    }



echo $result3->num_rows;
/*-----RADIO-BOX-----*/
    while ($id_rb = mysqli_fetch_assoc($result3)){
        $i = $id_rb['id_rb'];
        $rb = $_POST['rb'.$i];
        $query = "INSERT INTO rb_answer (id_ans_rb,answer_rb,id_rb,id_survey) VALUES ('$id_ans','$rb','$i','$id');";
        $res = $conn->query($query);
    }



echo $result1->num_rows;
/*-----NORMAL-----*/
    while ($id_n = mysqli_fetch_assoc($result1)){
        $i = $id_n['id_n'];
        $n = $_POST['n'.$i];
        $query = "INSERT INTO n_answer (id_ans_n,answer_n,id_n,id_survey) VALUES ('$id_ans','$n','$i','$id');";
        $res = $conn->query($query);
    }
        header("Location: http://localhost/Web-nhom-10/php/TrangChu-2.php");
    }
?>