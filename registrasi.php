<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-registrasi.css">
</head>
<body>
    <?php
        include 'connector.php';

        if(isset($_POST['submit'])){
            $nama = $_POST['name'];
            $nik = $_POST['nik'];
            $tanggalLahir = $_POST['tanggal_lahir'];
            $tempatLahir = $_POST['tempat_lahir'];
            $alamat = $_POST['alamat'];
            $noHP = $_POST['no_hp'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];
            $jk = $_POST['jk'];
            $statusPernikahan = $_POST['status_pernikahan'];
            $agama = $_POST['agama'];
            $pendidikanTerakhir = $_POST['pendidikan_terakhir'];
            $img = $_FILES['img']['name'];

            function cekUniqueEmail($email){
                include 'connector.php';
                $resultCekEmail = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
                return $resultCekEmail;
            }

            $emailAvailabled = cekUniqueEmail($email);

            if(isset($email)){
                echo 'email sudah ada';
            } else {
                $ekstensiDiPerbolehkan = array('jpg', 'png', 'jpeg');
                $explodeFile = explode('.', $img);
                $ekstensiFile = strtolower(end($explodeFile));
                $file_tmp = $_FILES['img']['tmp_name'];
                $randNumber = rand(1, 999);

                $newNameImage = $randNumber.'-'.$img;

                if(in_array($ekstensiFile, $ekstensiDiPerbolehkan) === true){
                    move_uploaded_file($file_tmp, 'img/'.$newNameImage);

                    $pw = password_hash($pw, PASSWORD_DEFAULT);

                    
                }
            }
        }
    ?>
    <div class="container">
        <h2 class="mt-5">Registrasi</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-borderless mt-5">
                <tr>
                    <td><label for="" class="form-label">Nama</label></td>
                    <td><input type="text" name="name" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">NIK</label></td>
                    <td><input type="text" name="nik" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Tempat, Tanggal Lahir</label></td>
                    <td>
                        <input type="text" name="tempat_lahir" id="" class="form-control w-5">
                        <input type="date" name="tanggal_lahir" id="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Alamat</label></td>
                    <td><input type="text" name="alamat" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Nomor Telepon</label></td>
                    <td><input type="text" name="no_hp" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Email</label></td>
                    <td><input type="email" name="email" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Password</label></td>
                    <td><input type="password" name="pw" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Jenis Kelamin</label></td>
                    <td>
                        <select name="jk" id="" class="form-control">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Status Pernikahan</label></td>
                    <td>
                        <select name="status_pernikahan" id="" class="form-control">
                            <option value="sudah menikah">Sudah Menikah</option>
                            <option value="belum menikah">Belum Menikah</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Agama</label></td>
                    <td>
                        <select name="agama" id="" class="form-control">
                            <option value="islam">Islam</option>
                            <option value="katolik">Katholik</option>
                            <option value="kristen">Kristen</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="konghuchu">Kong Hu Chu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                    <td><input type="text" name="pendidikan_terakhir" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Foto</label></td>
                    <td><input type="file" name="img" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Daftar" name="submit" class="btn btn-submit rounded mt-5"></td>
                </tr>
            </table> 
        </form>
    </div>
</body>
</html>