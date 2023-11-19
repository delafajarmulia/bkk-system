<?php
    // include 'edit-profil.php';
    

    function executeQuery($img_old, $userId, $from){
        include 'connector.php';
        include 'back.php';

        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $tempatLahir = $_POST['tempat_lahir'];
        $tanggalLahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['no_hp'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $jk = $_POST['jk'];
        $statusPernikahan = $_POST['status_pernikahan'];
        $agama = $_POST['agama'];
        $pendidikanTerakhir = $_POST['pendidikan_terakhir'];
        $img = $_FILES['img']['name'];

        var_dump($img_old);

        if($img !== ''){
            $eksetensiDiperbolehkan = array('jpg', 'png', 'jpeg');
            $explodeFile = explode('.', $img);
            $ekstensiFile = strtolower(end($explodeFile));
            $file_tmp = $_FILES['img']['tmp_name'];
            $rand_num = rand(1, 999);
            $newImgName = $rand_num .'-'.$img;

            if(in_array($ekstensiFile, $eksetensiDiperbolehkan) === true){
                move_uploaded_file($file_tmp, 'img/'.$newImgName);

                $queryUpdateWithImg = "UPDATE users SET nik='$nik', nama='$nama', alamat='$alamat', no_hp='$noHp', jenis_kelamin='$jk',agama='$agama',
                                    tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', email='$email', pendidikan_terakhir='$pendidikanTerakhir', 
                                    foto='$newImgName', status_pernikahan='$statusPernikahan' WHERE id=$userId";
                $resultUpdate = mysqli_query($conn, $queryUpdateWithImg);

                if(!$resultUpdate){
                    die('gagal update');
                }else{
                    backTo($userId, $from);
                }
            }
        }else{
            $queryUpdateWithoutImg = "UPDATE users SET nik='$nik', nama='$nama', alamat='$alamat', no_hp='$noHp', jenis_kelamin='$jk',agama='$agama',
                                    tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', email='$email', pendidikan_terakhir='$pendidikanTerakhir', 
                                    foto='$img_old', status_pernikahan='$statusPernikahan' WHERE id=$userId";
            $resultUpdate = mysqli_query($conn, $queryUpdateWithoutImg);

            if(!$resultUpdate){
                die('gagal update');
            }else{
                backTo($userId, $from);
            }
        }
    }

    // if(isset($_POST['submit'])){
        
    // }
?>