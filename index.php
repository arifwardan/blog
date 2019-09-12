<?php 

require_once "core/init.php";
require_once "view/header.php";

$blog = new Blog();
$show = $blog->showBlog();
?>

<!-- file css -->
<style>
body {
    background-image: url("view/gambar/bg4.jpg");
    background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    background-size: cover;
    margin: 40px auto;
    width: 65%;
}

.row{
    background-color: #fff1;
}

</style>
<!-- akhir file css -->
<body class="">
    <div class="row">
        <?php while($row = $show->fetch(PDO::FETCH_OBJ)): ?>
            <div class="raw">
                <h2><?= $row->judul; ?></h2>
                <p><?= $row->isi; ?></p>
                <p>Author : <?= $row->username; ?></p>
                <small class="waktu">Created : <?= $row->waktu; ?></small><br>
                <small class="tag">kategori: <a style="" href="kategori.php?id=<?=$row->id_kategori ;?>"><?= $row->nama_kategori; ?></a></small><br>
            </div>
        <?php endwhile; ?>
    </div>
</body>

<?php 

require_once "view/footer.php";

?>