<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "DELETE FROM question WHERE id_question = $id";
$result = mysqli_query($conn, $query);
header("Location: http://localhost/Web-nhom-10/php/ThaoLuan.php?id=$id");
?>