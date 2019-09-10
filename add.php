<?php 

session_start();
    if($_SESSION['username'] === null){
        header('Location: index.php');
    }

    $idUser = $_SESSION['user_id'];

require_once "core/init.php";
require_once "view/header.php";

$blog = new Blog();         
$show = $blog->blogUser($idUser);
$shown = $blog->showBlog();
$row = $shown->fetch(PDO::FETCH_OBJ);

?>

<style>
body {
    background-image: url("view/gambar/bg2.jpg");
    background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    background-size: cover;
    margin: 40px auto;
    width: 80%;
}

h2{
    color: white;
    text-align: center;
    background-color: #eee5;
}
</style>
<body>
<div class="gret">
    <h2 class="title">Selamat Datang <?= $_SESSION['username'] ?> Ini Halaman Blog Anda</h2>
<div class="add-article ">
    <form action="" method="POST" class="artikel">
            <label for="judul">Judul Blog</label>
            <input type="text" name="judul" placeholder="Masukkan Judul Blog" autofocus><br>
            <label for="isi">Blog Content</label><br><br>
            <textarea name="isi" placeholder="Masukkan Artikel Anda"></textarea><br><br>
            <label for="kategori">Kategori Blog</label>
            <select name="kategori">
                <option value=2>Education</option>
                <option value=1>Tech</option>
                <option value=3>Game</option>
                <option value=4>Healt</option>
            </select><br><br>
            <div class="tbutton">
                <input type="submit" name="addBlog" value="Upload">
                <input type="reset"  value="Reset">
            </div>
    </form>

</div>

<div class="row">
    <?php foreach($show as $data => $value): ?>
            <div class="column middle">
                <h3><?=$value['judul']; ?></h3>
                    <p><?=$value['isi']; ?></p>
                <p class="waktu"><?= $value['waktu']; ?></p>
                <p class="tag">Kategori: <a href="kategori.php?id=<?= $value['kategori_id']; ?>">
                    <?php
                        $nama  = $value['kategori_id'];
                        $satu  = "Teknologi";
                        $dua   = "Education";
                        $tiga  = "Game";
                        $empat = "Healt";

                        if($nama == 1){
                            echo $satu;
                        }elseif ($nama == 2) {
                            echo $dua;
                        }elseif ($nama == 3) {
                            echo $tiga;
                        }elseif ($nama == 4) {
                            echo $empat;
                        }
                    ?>
                </a></p><br>
                <a href="delete.php?id=<?= $value['id']; ?>">Delete</a>
                <a href="edit.php?id=<?=$value['id']; ?>">Edit</a>
            </div>
            <hr>
    <?php endforeach; ?>
</div>

</div>
<?php 

if(isset($_POST['addBlog'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $user = $_SESSION['user_id'];
    $kategori = $_POST['kategori'];
    $add = $blog->addBlog($judul, $isi, $user, $kategori);
    if ($add == "Success") {
        header('Location: add.php');
        echo "<script>alert('berhasil menambahkan')</script>";
    }
} 

require_once "view/footer.php";

?>
</body>