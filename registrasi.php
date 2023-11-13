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
                    <td><input type="text" name="name" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Agama</label></td>
                    <td><input type="text" name="name" id="" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="" class="form-label">Pendidikan Terakhir</label></td>
                    <td><input type="text" name="name" id="" class="form-control"></td>
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