<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include 'connector.php';
        $userId = $_GET['user_id'];

        $queryGetUserById = "SELECT * FROM users WHERE id=$userId";
        $resultGetUserById = mysqli_query($conn, $queryGetUserById);

        $from = $_GET['from'];

        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $nik = $_POST['nik'];
            $tempatLahir = $_POST['tempat_lahir'];
            $tanggalLahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $noHp = $_POST['no_hp'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];
            $jk = $_POST['jk'];
            $agama = $_POST['agama'];
            $pendidikanTerakhir = $_POST['pendidikan_terakhir'];
            $img = $_FILES['img']['name'];

            $result = 'hello';

            if(!$result){
                die('error');
            }else{
                switch($from){
                    case 'add-lowongan':
                        header("location:add-lowongan.php?user_id=$userId");
                    break;
                    case 'add-perusahaan':
                        header("location:add-perusahaan.php?user_id=$userId");
                    break;
                    case 'edit-lowongan':
                        $lowonganId = $_GET['lowongan_id'];
                        $perusahaanId = $_GET['perusahaan_id'];
                        header("location:edit-lowongan.php?user_id=$userId&&lowongan_id=$lowonganId&&perusahaan_id=$perusahaanId");
                    break;
                    case 'dashboard-admin':
                        header("location:dashboard-admin.php?user_id=$userId");
                    break;
                    case 'dashboard':
                        header("location:dashboard.php?user_id=$userId");
                    break;
                    case 'detail-info-loker':
                        $lowonganId = $_GET['lowongan_id'];
                        $perusahaanId = $_GET['perusahaan_id'];
                        header("location:detail-info-loker.php?user_id=$userId&&lowongan_id=$lowonganId&&perusahaan_id=$perusahaanId");
                    break;
                    case 'pelamaran':
                        $lowonganId = $_GET['lowongan_id'];
                        header("location:pelamaran.php?user_id=$userId&&lowongan_id=$lowonganId");
                    break;
                    default:
                        break;
                }
                    
            }
        }
    ?>

    <div class="container">
        <h2 class="mt-5">Edit Profil</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                while($data = mysqli_fetch_assoc($resultGetUserById)){
                    echo password_hash($data['password'], PASSWORD_DEFAULT);
            ?>
                <table class="table table-borderless mt-5">
                    <tr>
                        <td><label for="" class="form-label">Nama</label></td>
                        <td><input type="text" name="nama" id="" class="form-control" value="<?php echo $data['nama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">NIK</label></td>
                        <td><input type="text" name="nik" id="" class="form-control" value="<?php echo $data['nik'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Tempat, Tanggal Lahir</label></td>
                        <td>
                            <input type="text" name="tempat_lahir" id="" class="form-control w-5" value="<?php echo $data['tempat_lahir'];?>">
                            <input type="date" name="tanggal_lahir" id="" class="form-control" value="<?php echo date('Y-m-d', strtotime($data['tanggal_lahir']));?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Alamat</label></td>
                        <td><input type="text" name="alamat" id="" class="form-control" value="<?php echo $data['alamat'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nomor Telepon</label></td>
                        <td><input type="text" name="no_hp" id="" class="form-control" value="<?php echo $data['no_hp'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Email</label></td>
                        <td><input type="email" name="email" id="" class="form-control" value="<?php echo $data['email'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Password</label></td>
                        <td><input type="password" name="pw" id="" class="form-control" value="<?php echo $data['password'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Jenis Kelamin</label></td>
                        <td><input type="text" name="jk" id="" class="form-control" value="<?php echo $data['jenis_kelamin'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Agama</label></td>
                        <td><input type="text" name="agama" id="" class="form-control" value="<?php echo $data['agama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                        <td><input type="text" name="pendidikan_terakhir" id="" class="form-control" value="<?php echo $data['pendidikan_terakhir'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Foto</label></td>
                        <td><input type="file" name="img" id="" class="form-control" value="<?php echo $data['foto'];?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Daftar" name="submit" class="btn btn-submit rounded mt-5"></td>
                    </tr>
                </table> 
            <?php } ?>
        </form>
    </div>
</body>
</html>