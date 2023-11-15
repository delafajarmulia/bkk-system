<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lowongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-edit-lowongan.css">
</head>
<body>
    <?php
        include 'connector.php';
        $userId = $_GET['user_id'];
        $perusahaanId = $_GET['perusahaan_id'];
        $lowonganId = $_GET['lowongan_id'];
        // var_dump($userId, $perusahaanId, $lowonganId);

        $queryAllPerusahaan = 'SELECT id, nama FROM perusahaans';
        $resultAllPerusahaans = mysqli_query($conn, $queryAllPerusahaan);

        $queryGetPerusahaanById = "SELECT id, nama FROM perusahaans WHERE id=$perusahaanId";
        $resultPerusahaanById = mysqli_query($conn, $queryGetPerusahaanById);

        $queryGetLowonganById = "SELECT * FROM lowongans WHERE id=$lowonganId";
        $resultLowonganById = mysqli_query($conn, $queryGetLowonganById);

        if(isset($_POST['submit'])){
            $perusahaanId = $_POST['perusahaan_id'];
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

            $queryUpdateLowongan = "UPDATE lowongans SET perusahaan_id=$perusahaanId, posisi='$posisi', kuota=$kuota, start_time='$startTime', end_time='$endTime', 
                                    notes='$notes', min_age=$minAge, max_age=$maxAge, sistem_pelamaran='$sistemPelamaran', pengalaman='$pengalaman', 
                                    pendidikan_terakhir='$pendidikanTerakhir', jurusan='$jurusan', gender='$gender'
                                    WHERE id=$lowonganId";
            $resultUpdateLowongan = mysqli_query($conn, $queryUpdateLowongan);
            if(!$resultUpdateLowongan){
                die('gagal');
            }else{
                header("location:dashboard-admin.php?user_id=$userId");
            }
        }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a href="dashboard-admin.php?user_id=<?php echo $userId;?>" class="navbar-brand ms-5">Info Loker</a>
        <div class="d-flex justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item position-absolute top-0 end-0 me-5 mt-2">
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=edit-lowongan" class="nav-link">Edit Profil</a>
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
                    <td>
                        <select name="perusahaan_id" id="perusahaan_id" required class="form-control">
                            <?php while($data = mysqli_fetch_assoc($resultPerusahaanById)){?>
                                <option selected value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                            <?php } ?>
                            <?php while($dataPerusahaan = mysqli_fetch_assoc($resultAllPerusahaans)){?>
                                <option value="<?php echo $dataPerusahaan['id'];?>"><?php echo $dataPerusahaan['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <?php
                    while($dataLowongan = mysqli_fetch_assoc($resultLowonganById)){
                ?>
                        <tr>
                            <td><label for="" class="form-label">Posisi</label></td>
                            <td><input type="text" name="posisi" id="" class="form-control" value="<?php echo $dataLowongan['posisi'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Kuota</label></td>
                            <td><input type="number" name="kuota" id="" class="form-control" value="<?php echo $dataLowongan['kuota'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Waktu Mulai</label></td>
                            <td><input type="date" name="start_time" id="" class="form-control" value="<?php echo date('Y-m-d', strtotime($dataLowongan['start_time']))?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Waktu Selesai</label></td>
                            <td><input type="date" name="end_time" id="" class="form-control" value="<?php echo date('Y-m-d', strtotime($dataLowongan['end_time']))?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Minimal Usia</label></td>
                            <td><input type="number" name="min_age" id="" class="form-control" value="<?php echo $dataLowongan['min_age'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Maksimal Usia</label></td>
                            <td><input type="number" name="max_age" id="" class="form-control" value="<?php echo $dataLowongan['max_age'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                            <td><input type="text" name="pendidikan_terakhir" id="" class="form-control" value="<?php echo $dataLowongan['pendidikan_terakhir'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Jurusan</label></td>
                            <td><input type="text" name="jurusan" id="" class="form-control" value="<?php echo $dataLowongan['jurusan'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Sistem Pelamaran</label></td>
                            <td>
                                <select name="sistem_pelamaran" id="sistem_pelamaran" class="form-control">
                                    <option selected value="<?php echo $dataLowongan['sistem_pelamaran'];?>"><?php echo $dataLowongan['sistem_pelamaran'];?></option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Gender</label></td>
                            <td>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected value="<?php echo $dataLowongan['gender'];?>"><?php echo $dataLowongan['gender'];?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Semua Gender">Semua Gender</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">pengalaman</label></td>
                            <td><input type="text" name="pengalaman" id="" class="form-control" value="<?php echo $dataLowongan['pengalaman'];?>"></td>
                        </tr>
                        <tr>
                            <td><label for="" class="form-label">Notes</label></td>
                            <td><input type="text" name="notes" id="" class="form-control" value="<?php echo $dataLowongan['notes'];?>"></td>
                        </tr>
                <?php } ?>
                <tr>
                    <td colspan="2"><input type="submit" value="Tambah" name="submit" class="btn btn-add mt-5"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>