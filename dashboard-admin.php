<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-dash-admin.css">
</head>
<body>
    <?php
        include 'connector.php';

        $userId = $_GET['user_id'];
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard-admin.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=dashboard-admin" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="mt-3 ">Dashboard Admin</h2>
        <div class="d-flex justify-content-end">
            <a href="add-perusahaan.php?user_id=<?php echo $userId;?>" class="btn btn-add"><i class="bi bi-file-earmark-plus-fill"></i> Tambah Perusahaan</a>
            <a href="add-lowongan.php?user_id=<?php echo $userId;?>" class="btn btn-add"><i class="bi bi-file-earmark-plus-fill"></i> Tambah Lowongan</a>
        </div>
        <table class="table table-striped table-bordered mt-5">
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Alamat</th>
                <th>Kuota</th>
                <th>Deadline</th>
                <th>Action</th>
            </tr>

            <?php
                $query = "SELECT l.id AS id, p.nama AS nama_perusahaan, posisi, alamat, kuota, end_time
                FROM lowongans AS l
                LEFT JOIN perusahaans AS p ON l.perusahaan_id=p.id
                ORDER BY l.id ASC";

                $result = mysqli_query($conn, $query);

                while($data = mysqli_fetch_assoc($result)){
            ?>
                    <tr>
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo $data['nama_perusahaan'];?></td>
                        <td><?php echo $data['posisi'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['kuota'];?></td>
                        <td><?php echo $data['end_time'];?></td>
                        <td>
                            <a href="hapus.php?lowongan_id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                            <a href="edit-lowongan.php?lowongan_id=<?php echo $data['id'];?>" class="btn btn-update"><i class="bi bi-pen-fill"></i></a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>