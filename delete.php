<?php 

require_once "core/init.php";

$blog = new Blog();
$show = $blog->showBlog();

if(isset($_GET['id'])){
    $delete = $blog->deleteBlog($_GET['id']);
    if (!$delete) {
        echo "gagal di hapus !";
    }

    header('Location: add.php');
}

?>