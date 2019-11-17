<?php
session_start(); 
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = 1;/*mysqli_real_escape_string($conn, $_GET['id'])*/
/*-----CHECKBOX-----*/
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $sum = "SELECT MAX(id_survey) as sum FROM survey";
    $re = $conn->query($sum);
    if($re->num_rows > 0){
        $sum_ans = mysqli_fetch_assoc($re);
        $id = $sum_ans['sum']+1;
    }
    else{
        $id = 1;
    }

    $cauhoi_cb0 = $cauhoi_cb1 = $cauhoi_cb2 =  ''; 
    $cauhoi_cb0 = $_POST['cauhoi_cb0'];
    $cauhoi_cb1 = $_POST['cauhoi_cb1'];
    $cauhoi_cb2 = $_POST['cauhoi_cb2'];
    $dapan_cb0 = $_POST['dapan_cb0'];
    $dapan_cb1 = $_POST['dapan_cb1'];
    $dapan_cb2 = $_POST['dapan_cb2'];

    if($cauhoi_cb0 != ''){
        $dapan0 = $dapan_cb0[0];
        for($i=0;$i<count($dapan_cb0)-1;$i++){
            $dapan0 = $dapan0.'/'.$dapan_cb0[$i+1];
        }
        $dapan0 = $dapan_cb0[0].'/'.$dapan_cb0[1];
        $query = "INSERT INTO cb_question (cb_question,all_answer_cb,id_survey) VALUES ('$cauhoi_cb0','$dapan0','$id');";
        $res = $conn->query($query);
    }
    if($cauhoi_cb1 != ''){
        $dapan1 = $dapan_cb1[0];
        for($i=0;$i<count($dapan_cb)-1;$i++){
            $dapan1 = $dapan0.'/'.$dapan_cb1[$i+1];
        }
        $dapan1 = $dapan_cb1[0].'/'.$dapan_cb1[1];
        $query = "INSERT INTO cb_question (cb_question,all_answer_cb,id_survey) VALUES ('$cauhoi_cb1','$dapan1','$id');";
        $res = $conn->query($query);
    }
    if($cauhoi_cb2 != ''){
        $dapan2 = $dapan_cb2[0];
        for($i=0;$i<count($dapan_cb2)-1;$i++){
            $dapan2 = $dapan2.'/'.$dapan_cb2[$i+1];
        }
        $dapan2 = $dapan_cb2[0].'/'.$dapan_cb2[1];
        $query = "INSERT INTO cb_question (cb_question,all_answer_cb,id_survey) VALUES ('$cauhoi_cb2','$dapan2','$id');";
        $res = $conn->query($query);
    }


    /*-----RADIOBOX-----*/
    $cauhoi_rb0 = $cauhoi_rb1 = $cauhoi_rb2 =  ''; 
    $cauhoi_rb0 = $_POST['cauhoi_rb0'];
    $cauhoi_rb1 = $_POST['cauhoi_rb1'];
    $cauhoi_rb2 = $_POST['cauhoi_rb2'];
    $dapan_rb0 = $_POST['dapan_rb0'];
    $dapan_rb1 = $_POST['dapan_rb1'];
    $dapan_rb2 = $_POST['dapan_rb2'];



    if($cauhoi_rb0 != ''){
        $dapan0 = $dapan_rb0[0];
        for($i=0;$i<count($dapan_rb0)-1;$i++){
            $dapan0 = $dapan0.'/'.$dapan_rb0[$i+1];
        }
        $query = "INSERT INTO rb_question (rb_question,all_answer_rb,id_survey) VALUES ('$cauhoi_rb0','$dapan0','$id');";
        $res = $conn->query($query);
    }
    if($cauhoi_rb1 != ''){
        $dapan1 = $dapan_rb1[0];
        for($i=0;$i<count($dapan_rb1)-1;$i++){
            $dapan1 = $dapan1.'/'.$dapan_rb1[$i+1];
        }
        $dapan1 = $dapan_rb1[0].'/'.$dapan_rb1[1];
        $query = "INSERT INTO rb_question (rb_question,all_answer_rb,id_survey) VALUES ('$cauhoi_rb1','$dapan1','$id');";
        $res = $conn->query($query);
    }
    if($cauhoi_rb2 != ''){
        $dapan2 = $dapan_rb2[0];
        for($i=0;$i<count($dapan_rb2)-1;$i++){
            $dapan2 = $dapan2.'/'.$dapan_rb2[$i+1];
        }
        $dapan2 = $dapan_rb2[0].'/'.$dapan_rb2[1];
        $query = "INSERT INTO rb_question (rb_question,all_answer_rb,id_survey) VALUES ('$cauhoi_rb2','$dapan2','$id');";
        $res = $conn->query($query);
    }


    /*-----NORMAL-----*/
    $cauhoi_n=$_POST['cauhoi_n'];

    for($i=0;$i<count($cauhoi_n);$i++){
        $cauhoi = $cauhoi_n[$i];
        $query = "INSERT INTO n_question (n_question,id_survey) VALUES ('$cauhoi','$id');";
        $res = $conn->query($query);
    }
    /*-----SURVEY-----*/
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $survey = $_POST['survey'];
    $user = $_SESSION['login'];
    $time = date("Y-m-d");
    $qry = "insert into survey (survey,user,time) values('$survey','$user','$time');";
    $res = $conn->query($qry);
    header("Location: http://localhost/Web-nhom-10/php/Phieukhaosat.php?id=".$id."");
}

?>