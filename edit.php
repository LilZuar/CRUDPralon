<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>GTHRIS.COM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:20px">
        <h2>Edit Employee</h2>
    <hr>
        <?php
        if(isset($_GET['id'])){
            $id_emp = $_GET['id'];
            $select = mysqli_query($koneksi, "SELECT * FROM table_employee WHERE id_emp='$id_emp'") or die(mysqli_error($koneksi));
            if(mysqli_num_rows($select) == 0){
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            }else{
                $data = mysqli_fetch_assoc($select);
            }
        }
        ?>

        <?php
//jika tombol simpan di tekan/klik
        if(isset($_POST['submit'])){
            $id_emp = $_GET['id'];
            $full_name = $_POST['full_name'];
            $nik = $_POST['nik'];
            $sql = mysqli_query($koneksi, "UPDATE table_employee SET full_name='$full_name', nik='$nik' WHERE id_emp='$id_emp'") or die(mysqli_error($koneksi));
            if($sql){
                echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id_emp.'";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>
        <form action="edit.php?id=<?php echo $id_emp; ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">id emp</label>
                <div class="col-sm-10">
                    <input type="text" name="id_emp" class="form-control" size="4" value="<?php echo $data['id_emp']; ?>" readonly required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" value="<?php echo $data['full_name']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nik</label>
                <div class="col-sm-10">
                    <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="index.php" class="btn btn-warning">KEMBALI</a>
                </div>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
</body>
</html>
