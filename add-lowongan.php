<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-add-lowongan.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard-admin.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=add-lowongan" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Tambah Lowongan</h3>
        <form action="" method="post">
            <table class="table table-borderless mt-5">
                <tr>
                    <td><label for="" class="form-label">Nama Perusahaan</label></td>
                    <td><input type="text" name="nama" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Posisi</label></td>
                    <td><input type="text" name="posisi" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Waktu Mulai</label></td>
                    <td><input type="date" name="start_time" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Waktu Selesai</label></td>
                    <td><input type="date" name="end_time" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Minimal Usia</label></td>
                    <td><input type="text" name="min_age" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Maksimal Usia</label></td>
                    <td><input type="text" name="max_age" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                    <td><input type="text" name="pendidikan_terakhir" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Sistem Pelamaran</label></td>
                    <td><input type="text" name="sistem_pelamaran" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">pengalaman</label></td>
                    <td><input type="text" name="pengalaman" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Notes</label></td>
                    <td><input type="text" name="notes" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Tambah" name="submit" class="btn btn-add mt-5"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        include 'connector.php';

        if(isset($_POST['submit'])){
            $namaPerusahaan = $_POST['nama'];
            $posisi = $_POST['posisi'];
            $startTime = $_POST['start_time'];
            $endTime = $_POST['end_time'];
            $minAge = $_POST['min_age'];
            $maxAge = $_POST['max_age'];
            $pendidikanTerakhir = $_POST['pendidikan_terakhir'];
            $sistemPelamaran = $_POST['sistem_pelamaran'];
            $pengalaman = $_POST['pengalaman'];
            $notes = $_POST['notes'];
        }
    ?>
</body>
</html>