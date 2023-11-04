<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Loker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card col-md-5 border-0">
                <h3 class="text-center">Login</h3>
                <form action="" method="post" class="">
                    <div class="mb-3 ms-5 me-5">
                        <label for="" class="form-label f-label-first">Email</label><br>
                        <input type="text" class="form-control input-login" name="email">
                    </div>
                    <div class="mb-3 ms-5 me-5">
                        <label for="" class="form-label">Password</label><br>
                        <input type="text" class="form-control input-login" name="password">
                    </div>
                    <div class="mb-3 ms-5">
                        <input type="submit" name="submit" class="btn" value="Login">
                        <!-- <a href="" class="btn" name="submit">Login</a> -->
                    </div>
                    <p class="text-center">Belum punya akun? <a href="registrasi.php">Daftar Disini</a></p>
                </form>
            </div>
        </div>
    </div>

    <?php
        session_start();
        include 'connector.php';

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pw = $_POST['password'];

            $query = mysqli_query($conn, "SELECT id, email, password, role FROM users WHERE email='$email'");
            $result = mysqli_fetch_assoc($query);
            $user_id = $result['id'];
            if($result !== null){
                if(password_verify($pw, $result['password'])){
                    $_SESSION['login'] = true;
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['role'] = $result['role'];
                    if($result['role'] === 'admin'){
                        header("location:dashboard-admin.php?user_id=$user_id");
                    }else{
                        header("location:dashboard.php?user_id=$user_id");
                    }
                }
            }
        }
    ?>
</body>
</html>