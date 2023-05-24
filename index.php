<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
        <title>WEB.COM</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarSupportContent" aria-target="navbarSupportContent" aria-expand="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:20px">
        <h2>Daftar Karyawan</h2>
        <hr>
            <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NO.</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>NAMA</th>
                    <th>ACTION</th>
                </tr>
            </thead>   
            <tbody>

    <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM table_employee ORDER BY id_emp DESC") or 	die(mysqli_error($koneksi));

            if(mysqli_num_rows($sql) > 0){
                $no = 1;
                while($data = mysqli_fetch_assoc($sql)){
                    echo '
                    <tr>
                    <td>'.$no.'</td>
                    <td>'.$data['id_emp'].'</td>
                    <td>'.$data['nik'].'</td>
                    <td>'.$data['full_name'].'</td>
                    <td>
                    <a href="edit.php?id='.$data['id_emp'].'"
                    class="badge badge-warning">Edit</a>
                    <a
                    href="delete.php?id='.$data['id_emp'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                    </td>
                    </tr>
                ';
                $no++;
                }
            } else{
                echo '
                <tr>
                <td colspan="6">Tidak ada data.</td>
                </tr>
                ';
            }
    ?>

            <tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



