<?php
if (isset($_GET['id_pin']) && isset($_GET['id']) && isset($_GET['del'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'q_a');
    $id_pin = $_GET['id_pin'];
    $id = $_GET['id'];
    if (($_GET['del']) == '0') {
        $result = mysqli_query($conn, "UPDATE question SET id_check = '$id_pin' WHERE id_question = $id");
        if ($result) {
            header("Location: http://localhost/Web-nhom-10/php/CauHoi.php?ques=$id");
        } else {
            echo "<p>Fail.$conn->error.</p>";
        }
    }
    if (($_GET['del']) == '1') {
        $id_pin = -1;
        $result = mysqli_query($conn, "UPDATE question SET id_check = '$id_pin' WHERE id_question = $id");
        if ($result) {
            header("Location: http://localhost/Web-nhom-10/php/CauHoi.php?ques=$id");
        } else {
            echo "<p>Fail.$conn->error.</p>";
        }
    }
}
