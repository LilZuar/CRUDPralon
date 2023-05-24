<?php
$koneksi = mysqli_connect("localhost","root","","table_employee");
if (mysqli_connect_errno()){
echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>
