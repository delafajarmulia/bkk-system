<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Info Loker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-detail-loker.css">
</head>
<body>
    <?php
        include 'connector.php';
        $lowonganId = $_GET['lowongan_id'];
        $perusahaanId = $_GET['perusahaan_id'];
        $userId = $_GET['user_id'];
        // var_dump($lowonganId, $perusahaanId);
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=detail-info-loker" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        $query = "SELECT l.id AS id, p.nama AS nama_perusahaan, posisi, end_time, p.alamat AS alamat, p.kontrak_kerja AS kontrak_kerja,
                    p.logo AS logo, min_age, max_age, pendidikan_terakhir, jurusan, pengalaman, gender
                    FROM lowongans AS l
                    LEFT JOIN perusahaans AS p 
                    ON l.perusahaan_id=p.id
                    WHERE l.id=$perusahaanId";
        $result = mysqli_query($conn, $query);
        //var_dump($result);
        while($data = mysqli_fetch_assoc($result)){
            // echo $data['nama_perusahaan'];
    ?>
            <div class="container mt-5">
                <div class="con-title">
                    <img src="img/<?php echo $data['logo'];?>" alt="" style="width:150px">
                    <div class="title">
                        <h1><?php echo $data['nama_perusahaan'];?></h1>
                        <h3><?php echo $data['posisi'];?></h3>
                        <p class="deadline"><?php echo $data['end_time'];?></p>
                    </div>
                </div>

                <div class="con-ketentuan row-cols-2 g-5 mt-5">
                    <div class="ketentuan-kiri">
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['alamat'];?></p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['jurusan'];?></p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['kontrak_kerja'];?></p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['pengalaman'];?></p>
                        </div>
                    </div>
                    <div class="ketentuan-kanan">
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['min_age'];?> Tahun</p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['max_age'];?> Tahun</p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['gender'];?></p>
                        </div>
                        <div class="ket">
                            <i class="bi bi-house-fill"></i><p class="ps-2"><?php echo $data['pendidikan_terakhir'];?></p>
                        </div>
                    </div>
                </div>
                <a href="pelamaran.php?user_id=<?php echo $userId;?>&&lowongan_id=<?php echo $data['id'];?>" class="btn btn-detail mt-5">Daftar</a>
            </div>
    <?php
        }
    ?>
</body>
</html>