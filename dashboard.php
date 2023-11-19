<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-dash.css">
</head>
<body>
    <?php
        include 'connector.php';

        $userId = $_GET['user_id'];
        //var_dump($userId);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=dashboard" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="conatainer mt-5">
        <div class="row row-cols-2 g-3">
            <?php
                $query = "SELECT l.id AS lowongan_id, p.id AS perusahaan_id, p.nama AS nama, posisi, p.alamat AS domisili, end_time, logo 
                        FROM lowongans AS l
                        LEFT JOIN perusahaans AS p
                        ON l.perusahaan_id=p.id
                        WHERE end_time>CURRENT_DATE()";
                $result = mysqli_query($conn, $query);

                while($data = mysqli_fetch_assoc($result)){
                    $lowonganId = $data['lowongan_id'];
                    $perusahaanId = $data['perusahaan_id'];
            ?>
                    <a href="detail-info-loker.php?user_id=<?php echo $userId;?>&&lowongan_id=<?php echo $lowonganId;?>&&perusahaan_id=<?php echo $perusahaanId;?>">
                        <div class="card me-3">
                            <img src="img/<?php echo $data['logo'];?>" alt="">
                            <h3><?php echo $data['nama'];?></h3>
                            <p class="p-atas">Posisi : <?php echo $data['posisi'];?></p>
                            <p>Domisili : <?php echo $data['domisili'];?></p>
                            <p>Deadline : <?php echo $data['end_time'];?></p>
                        </div>
                    </a>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>