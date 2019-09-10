<?php 
session_start();

require_once "core/init.php";
require_once "view/header.php";


if (isset($_SESSION['username']) && isset($_SESSION['user_id'])){
    header('Location: add.php');
}

?>

<style>
    body{
        background-image: url("view/gambar/bg2.jpg");
        background-repeat: no-repeat, repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<form action="login.php" method="POST">
    <div class="container">
        <h1>Sign In</h1>
        <hr>
        <input type="hidden" name="userid">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" autofocus>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" autofocus>
        <input type="submit" name= "login" class="signupbtn" value="Sign In">
        <input type="reset" class="cancelbtn" value="Reset">
        <input style="width:100%;" type="submit" name= "register" class="signupbtn" value="Sign Up">
    </div>
</form>

<?php
if (isset($_POST['register'])) {
    header('Location: register.php');
}

if(isset($_POST['login'])){
    
    if(empty($_POST['username']) && empty($_POST['password'])){

        echo "<script>alert('Username Or Passsword Tidak Boleh Kosong')</script>";

    }else{
        
        $sql = "SELECT * FROM user WHERE username = :user AND password = :pass ";

        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                'user' => $_POST['username'],
                'pass' => $_POST['password']
            ]
        );
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        
        $count = $stmt->rowCount();
        if ($count > 0) {
            
            $_SESSION['user_id']  = $data->id_user;
            $_SESSION['username'] = $data->username;

            header('Location: add.php');
        }else {
            
            $pesan = "<script>alert('Massukkan Username Dan Passsword Yang Valid')</script>";

            echo $pesan;
        }
    }
}