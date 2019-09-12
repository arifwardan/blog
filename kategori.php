<?php 

require_once "core/init.php";
require_once "view/header.php";

$blog = new Blog();
$show = $blog->kategoriBlog($_GET['id']);
?>

<!-- file css -->
<style>
body {
    background-image: url("view/gambar/bg3.jpg");
    background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    background-size: cover;
    margin: 40px auto;
    width: 65%;
}

</style>
<!-- akhir file css -->

    <div class="row">
        <?php foreach($show as $data => $value): ?>
            <div class="column middle">
                <h2><?= $value['judul']; ?></h2>
                <p><?= $value['isi']; ?></p>
                <p>Author : <?= $value['username']; ?></p>
                <p class="waktu"><?= $value['waktu']; ?></p>
                <p class="tag">kategori: <?= $value['nama_kategori']; ?></p><br>
            </div>
        <?php endforeach; ?>
    </div>


<?php 

require_once "view/footer.php";

?>;