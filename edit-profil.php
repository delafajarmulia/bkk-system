<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include 'connector.php';
        // include 'back.php';
        include 'process-edit.php';
        $userId = $_GET['user_id'];
        $from = $_GET['from'];
        $img_old;

        $queryGetUserById = "SELECT * FROM users WHERE id=$userId";
        $resultGetUserById = mysqli_query($conn, $queryGetUserById);
        // while($dataUser = mysqli_fetch_assoc($resultGetUserById)){
        //     $img_old = $dataUser['foto'];
        // }

        
        

        // if(isset($_POST['submit'])){
            // $img_old2 = $img_old;
            // var_dump($img_old);
            
            // checkedSubmit();
            // var_dump($nik);
            // $result = '';

            // if(!$result){
            //     die('error');
            // }else{
                
                    
            // }
        // }
    ?>

    <div class="container">
        <h2 class="mt-5">Edit Profil</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                while($data = mysqli_fetch_assoc($resultGetUserById)){
                    echo password_hash($data['password'], PASSWORD_DEFAULT);
                    $img_old = $data['foto'];
            ?>
                <table class="table table-borderless mt-5">
                    <tr>
                        <td><label for="" class="form-label">Nama</label></td>
                        <td><input type="text" name="nama" id="" class="form-control" value="<?php echo $data['nama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">NIK</label></td>
                        <td><input type="text" name="nik" id="" class="form-control" value="<?php echo $data['nik'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Tempat, Tanggal Lahir</label></td>
                        <td>
                            <input type="text" name="tempat_lahir" id="" class="form-control w-5" value="<?php echo $data['tempat_lahir'];?>">
                            <input type="date" name="tanggal_lahir" id="" class="form-control" value="<?php echo date('Y-m-d', strtotime($data['tanggal_lahir']));?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Alamat</label></td>
                        <td><input type="text" name="alamat" id="" class="form-control" value="<?php echo $data['alamat'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nomor Telepon</label></td>
                        <td><input type="text" name="no_hp" id="" class="form-control" value="<?php echo $data['no_hp'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Email</label></td>
                        <td><input type="email" name="email" id="" class="form-control" value="<?php echo $data['email'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Password</label></td>
                        <td><input type="password" name="pw" id="" class="form-control" value="<?php echo $data['password'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Jenis Kelamin</label></td>
                        <td><input type="text" name="jk" id="" class="form-control" value="<?php echo $data['jenis_kelamin'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Status Pernikahan</label></td>
                        <td><input type="text" name="status_pernikahan" id="" class="form-control" value="<?php echo $data['status_pernikahan'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Agama</label></td>
                        <td><input type="text" name="agama" id="" class="form-control" value="<?php echo $data['agama'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                        <td><input type="text" name="pendidikan_terakhir" id="" class="form-control" value="<?php echo $data['pendidikan_terakhir'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Foto</label></td>
                        <td><input type="file" name="img" id="img" class="form-control" value="<?php echo $data['foto'];?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Daftar" name="submit" class="btn btn-submit rounded mt-5"></td>
                    </tr>
                </table> 
            <?php } ?>
        </form>
    </div>

    <?php
        // function checkedSubmit(){
            
        // }

        if(isset($_POST['submit'])){
            // var_dump($img_old);
            executeQuery($img_old, $userId, $from);
        }
        
    ?>
</body>
</html>