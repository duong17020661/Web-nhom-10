<?php
$conn = mysqli_connect('localhost', 'root', '', 'q_a');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "DELETE FROM topic WHERE id_topic = $id";
$result = mysqli_query($conn, $query);
header("Location: http://localhost/Web-nhom-10/php/TrangChu.php");
?>