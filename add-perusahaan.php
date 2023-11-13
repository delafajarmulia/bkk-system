<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style-add-perusahaan.css">
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
                    <a href="edit-profil.php?user_id=<?php echo $userId;?>&&from=add-perusahaan" class="nav-link">Edit Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 class="mt-3">Tambah Perusahaan</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-borderless mt-5">
                <tr>
                    <td><label for="" class="form-label">Nama</label></td>
                    <td><input type="text" name="name" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Email</label></td>
                    <td><input type="email" name="email" id="" class="form-control"></td>
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
                    <td><label for="" class="form-label">Kontrak Kerja</label></td>
                    <td><input type="text" name="kontrak_kerja" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Logo</label></td>
                    <td><input type="file" name="img" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Tambah" name="submit" class="btn btn-submit mt-5 rounded"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $kontrak_kerja = $_POST['kontrak_kerja'];
            $img = $_FILES['img']['name'];

            function cekUniqueEmail($email){
                include 'connector.php';
                $queryCekEmail = mysqli_query($conn, "SELECT id FROM perusahaans WHERE email='$email'");
                $resultCekEmail = mysqli_fetch_assoc($queryCekEmail);
                //var_dump($resultCekEmail);
                return $resultCekEmail;
            }

            $emailAvailable = cekUniqueEmail($email);
            //var_dump($emailAvailable);

            if(isset($emailAvailable)){
                echo 'data sudah tersedia';
            }else{
                // var_dump($img);
                // cekImage($img);

                $ekstensiDiPerbolehkan = array('jpg', 'png', 'jpeg');
                $explodeFile = explode('.', $img);
                $ekstensiFile = strtolower(end($explodeFile));
                $file_tmp = $_FILES['img']['tmp_name'];
                $rand_num = rand(1, 999);

                $newNameImg = $rand_num . '-'.$img;

                if(in_array($ekstensiFile, $ekstensiDiPerbolehkan) === true){
                    move_uploaded_file($file_tmp, 'img/'.$newNameImg);

                    $queryAddPerusahaan = "INSERT INTO perusahaans(nama, email, alamat, no_hp, logo, kontrak_kerja) 
                                            VALUES('$name', '$email','$alamat','$no_hp','$newNameImg','$kontrak_kerja')";
                    $resultAddPerusahaan = mysqli_query($conn, $queryAddPerusahaan);

                    if(!$resultAddPerusahaan){
                        die('gagal');
                    } else{
                        header("location:dashboard-admin.php?pesan=input&&user_id=$userId");
                    }
                }
            }

            // function cekImage($img){
            //     include 'connector.php';

                
            // }
        }
        
    ?>
</body>
</html>