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

    <?php
        include 'connector.php';
        $userId = $_GET['user_id'];
        $resultNamaPerusahaan = mysqli_query($conn, "SELECT id, nama FROM perusahaans");
    ?>

    <div class="container mt-5">
        <h3>Tambah Lowongan</h3>
        <form action="" method="post">
            <table class="table table-borderless mt-5">
                <tr>
                    <td><label for="" class="form-label">Nama Perusahaan</label></td>
                    <td>
                        <select name="perusahaan_id" id="perusahaan_id" required class="form-control">
                            <option selected disabled>Pilih Perusahaan</option>
                            <?php while($dataPerusahaan = mysqli_fetch_assoc($resultNamaPerusahaan)){?>
                                <option value="<?php echo $dataPerusahaan['id'];?>"><?php echo $dataPerusahaan['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Posisi</label></td>
                    <td><input type="text" name="posisi" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Kuota</label></td>
                    <td><input type="number" name="kuota" id="" class="form-control"></td>
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
                    <td><input type="number" name="min_age" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Maksimal Usia</label></td>
                    <td><input type="number" name="max_age" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                    <td><input type="text" name="pendidikan_terakhir" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Jurusan</label></td>
                    <td><input type="text" name="jurusan" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Sistem Pelamaran</label></td>
                    <td>
                        <select name="sistem_pelamaran" id="sistem_pelamaran" class="form-control">
                            <option selected disabled>Pilih Sistem Pelamaran</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Gender</label></td>
                    <td>
                        <select name="gender" id="gender" class="form-control">
                            <option selected disabled>Pilih Gender</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Semua Gender">Semua Gender</option>
                        </select>
                    </td>
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
            $idPerusahaan = $_POST['perusahaan_id'];
            $posisi = $_POST['posisi'];
            $kuota = $_POST['kuota'];
            $startTime = $_POST['start_time'];
            $endTime = $_POST['end_time'];
            $minAge = $_POST['min_age'];
            $maxAge = $_POST['max_age'];
            $pendidikanTerakhir = $_POST['pendidikan_terakhir'];
            $jurusan = $_POST['jurusan'];
            $sistemPelamaran = $_POST['sistem_pelamaran'];
            $gender = $_POST['gender'];
            $pengalaman = $_POST['pengalaman'];
            $notes = $_POST['notes'];

            $queryAddLowongan = "INSERT INTO lowongans(perusahaan_id, posisi, kuota, start_time, end_time, notes, min_age, max_age, sistem_pelamaran, pengalaman, pendidikan_terakhir, jurusan, gender)
                                VALUES($idPerusahaan, '$posisi', $kuota, '$startTime', '$endTime', '$notes', $minAge, $maxAge, '$sistemPelamaran', '$pengalaman', '$pendidikanTerakhir', '$jurusan', '$gender')";

            $resultAddLowongan = mysqli_query($conn, $queryAddLowongan);

            if(!$resultAddLowongan){
                die('gagal menambahkan lowongan');
            }else{
                header("location:dashboard-admin.php?user_id=$userId");
            }
        }
    ?>
</body>
</html>