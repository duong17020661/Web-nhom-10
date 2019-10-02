<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '','q_a');
    if (isset($_POST['signup'])){
        $username = mysqli_real_escape_string($db, $POST['txtUsername']);
        $password_1 = mysqli_real_escape_string($db, $POST['txtPassword']);
        $password_2 = mysqli_real_escape_string($db, $POST['txtRePassword']);
        $first_name = mysqli_real_escape_string($db, $POST['txtFirstname']);
        $last_name = mysqli_real_escape_string($db, $POST['txtLastname']);
        $email = mysqli_real_escape_string($db, $POST['txtEmail']);
        $birthday = mysqli_real_escape_string($db, $POST['txtBirthday1']);
        $gender = mysqli_real_escape_string($db, $POST['txtGender']);
    }
    if (empty($username)) {array_push($error, "Chua nhap vao o nay");}
    if (empty($password)) {array_push($error, "Chua nhap vao o nay");}
    if (empty($email)) {array_push($error, "Chua nhap vao o nay");}
    if (empty($first_name)) {array_push($error, "Chua nhap vao o nay");}
    if (empty($last_name)) {array_push($error, "Chua nhap vao o nay");}
    if ($password_1 != $password_2) {array_push($error, "Chua nhap vao o nay");}
    $check_username = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if($user){
        if($user['username'] === $username) {array_push($error, "Chua nhap vao o nay");}
    }
    if(count($error) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO user(username, password, first_name, last_name, email,birthday, gender)
        VALUES ('$username', '$password', '$first_name', '$last_name', '$email', '$birthday', 'gender')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = 'Dang ky thanh cong';
        header('location: index.php ');
    }
?>