<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelamaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-pelamaran.css">
</head>
<body>
    <?php
        include 'connector.php';
        $userId = $_GET['user_id'];
        $lowonganId = $_GET['lowongan_id'];
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=pelamaran" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="info">
            <?php
                $queryGetDataLowongan = "SELECT l.id AS id, nama, posisi, logo FROM lowongans AS l
                                        LEFT JOIN perusahaans AS p ON  l.perusahaan_id=p.id
                                        WHERE l.id=$lowonganId";
                $resultDataLowongan = mysqli_query($conn, $queryGetDataLowongan);
                //var_dump($resultDataLowongan);
                while($data = mysqli_fetch_assoc($resultDataLowongan)){
            ?>
                <img src="img/<?php echo $data['logo'];?>" alt="">
                <div class="ms-5 mt-3">
                    <h3><?php echo $data['nama'];?></h3>
                    <h4><?php echo $data['posisi'];?></h4>
                </div>
            <?php } ?>
        </div>

        <?php
            $queryGetDataUser = "SELECT id, nik, nama, alamat, no_hp, jenis_kelamin, agama, tempat_lahir, tanggal_lahir, email, 
                                pendidikan_terakhir, foto FROM users WHERE id=$userId";
            $resultDataUser = mysqli_query($conn, $queryGetDataUser);
            while($data = mysqli_fetch_assoc($resultDataUser)){
        ?>
            <form action="" method="post">
                <table class="table table-borderless mt-5">
                    <tr>
                        <td><label for="" class="form-label">Nama</label></td>
                        <td><input type="text" name="name" id="" class="form-control" readonly value="<?php echo $data['nama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">NIK</label></td>
                        <td><input type="text" name="nik" id="" class="form-control" readonly value="<?php echo $data['nik'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">TTL</label></td>
                        <td><input type="text" name="name" id="" class="form-control" readonly value="<?php echo $data['nama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Alamat</label></td>
                        <td><input type="text" name="alamat" id="" class="form-control" readonly value="<?php echo $data['alamat'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nomor Telepon</label></td>
                        <td><input type="text" name="no_hp" id="" class="form-control" readonly value="<?php echo $data['no_hp'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Email</label></td>
                        <td><input type="email" name="email" id="" class="form-control" readonly value="<?php echo $data['email'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Jenis Kelamin</label></td>
                        <td><input type="text" name="jk" id="" class="form-control" readonly value="<?php echo $data['jenis_kelamin'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Agama</label></td>
                        <td><input type="text" name="agama" id="" class="form-control" readonly value="<?php echo $data['agama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                        <td><input type="text" name="pendidikan_terakhir" id="" class="form-control" readonly value="<?php echo $data['pendidikan_terakhir'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Foto</label></td>
                        <td><input type="file" name="img" id="" class="form-control" readonly value="<?php echo $data['foto'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nomor SKCK</label></td>
                        <td><input type="text" name="no_skck" id="" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nomor Ijazah</label></td>
                        <td><input type="text" name="no_ijazah" id="" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Kirim" name="submit" class="btn btn-kirim rounded mt-5"></td>
                    </tr>
                </table>
            </form>
        <?php } ?>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $noSKCK = $_POST['no_skck'];
            $noIjazah = $_POST['no_ijazah'];
            $alamat = $_POST['alamat'];
            //var_dump($userId. $lowonganId);

            if($noSKCK === null || $noIjazah === null){
                echo 'isi data dengan lengkap';
            }else{
                $queryLamarPekerjaan = "INSERT INTO detail_lamarans(lowongan_id, user_id, waktu_melamar, alamat, no_skck, no_ijazah) 
                                        VALUES($lowonganId, $userId, CURRENT_DATE(), '$alamat', '$noSKCK','$noIjazah');";
                $resultLamarPekerjaan = mysqli_query($conn, $queryLamarPekerjaan);
                
                if(!$resultLamarPekerjaan){
                    echo 'gagal';
                } else{
                    header("location:success.php");
                }
            }

            // function lamar($skck, $ijazah, $alamat){
                
            //      return true;
            // }
        }
    ?>
</body>
</html>