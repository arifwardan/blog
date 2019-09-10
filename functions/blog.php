<?php 

class Blog{

    public function __construct(){
        $user     = "root";
        $host     = "localhost";
        $pass     = "?>bismillah";
        $dbname   = "ubi";
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass) or die("Db Gak connect");
    }

    public function showBlog(){
        $sql = "SELECT * FROM blog 
                INNER JOIN kategori ON blog.kategori_id = kategori.id_kategori
                INNER JOIN user ON blog.user_id = user.id_user ";

        $statement = $this->db->prepare($sql);
        $statement->execute(([]));
    
        return $statement;
    }

    public function kategoriBlog($id){
        $sql = "SELECT * FROM blog 
                INNER JOIN kategori ON blog.kategori_id = kategori.id_kategori 
                INNER JOIN user ON blog.user_id = user.id_user
                WHERE id_kategori = ? ";

        $statement = $this->db->prepare($sql);
        $statement->execute(([$id]));
        return $statement;
    }

    public function blogUser($id){
        $sql       = "SELECT * FROM blog WHERE user_id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$id]));
        
        return $statement;//->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBlog($judul, $isi, $user, $kategori){
        $sql       = "INSERT INTO blog(judul, isi, user_id, kategori_id) VALUES ( ?, ?, ?, ? )";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$judul, $isi, $user, $kategori]));
        // return $statement;
        if ($statement) {
            return "Success";
        }else{
            die();
        }
    }

    public function register($username, $email, $password){
        $sql       = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$username, $email, $password]));

        if ($statement){
            return "Success";
        }else{
            die();
        }
    }

    public function login($username, $password){
        $sql       = "SELECT * FROM user WHERE username= ? password= ?";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$username, $password]));

        if ($statement) {
            return "Success";
        }else{
            die();
        }
    }

    public function deleteBlog($id){
        $sql       = "DELETE FROM blog WHERE id='$id'";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$id]));
        if ($statement) {
            return "delete Success";
        }else {
            die();
        }
    }

    public function editBlog($id){
        $sql       = "SELECT * FROM blog INNER JOIN kategori ON blog.kategori_id = kategori.id_kategori WHERE id = ? ";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$id]));
        return $statement;
    }

    public function updateBlog($id, $judul, $isi){
        $sql       = "UPDATE blog SET judul ='$judul', isi = '$isi' WHERE id='$id' ";
        $statement = $this->db->prepare($sql);
        $statement->execute(([$id, $judul, $isi]));
        if ($statement) {
            return "Success";
        }
    }

}

// $con = new Blog();
// print_r($con->addBlog('blog arif terminal', 'belajar dan terus belajar', 1, 2));

?>