<?php
    include 'connector.php';

    $lowonganId = $_GET['lowongan_id'];
    $userId = $_GET['user_id'];
    $queryHapusLowongan = "DELETE FROM lowongans WHERE id=$lowonganId";
    $resultHapusLowongan = mysqli_query($conn, $queryHapusLowongan);

    if(!$resultHapusLowongan){
        die('gagal menghapus data');
    }else{
        header("location:dashboard-admin.php?user_id=$userId");
    }
?>