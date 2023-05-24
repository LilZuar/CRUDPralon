<?php
include('config.php');
if(isset($_GET['id'])){ 
    $id_emp = $_GET['id'];
    $cek = mysqli_query($koneksi, "SELECT * FROM table_employee WHERE id_emp='$id_emp'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek) > 0){
        $del = mysqli_query($koneksi, "DELETE FROM table_employee WHERE id_emp='$id_emp'") or die(mysqli_error($koneksi));
        if($del){
            echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
        }else{
        echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
        }
    }
}
?>


