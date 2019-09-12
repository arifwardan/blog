<?php 

require_once "functions/blog.php";
// require_once "view/header.php";

?>

<head>
<title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="view/style.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
</head>

<style>
body{
    background-image: url("view/gambar/bg.jpg");
    background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    background-size: cover;
}
form {
    border: 1px solid #f1f1f1;
    border-radius: 10px 10px;
    padding: 15px;
}

</style>

<form style="width: 40%; float:right;" action="" method="POST">
    <div class="container">
        <h1 style="color: white;">Sign Up</h1>
        <hr>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password-repeat" required>
        <input type="submit" name= "regis" class="signupbtn" value="Register">
        <input type="reset" class="cancelbtn" value="Reset">
    </div>
</form>

<?php if(isset($_POST['regis'])){
        if ($_POST['password'] != $_POST['password-repeat']){ ?>
            <script>alert('Masukkan Password Yg Benar')</script>
<?php }else{
        $user  = $_POST['username'];
        $pass  = $_POST['password'];
        $email = $_POST['email'];
        $blog  = new Blog();
        $stmt  = $blog->register($user, $email, $pass);
    
        if($stmt == "Success"){
            header('Location: index.php');
        }
    }
} 