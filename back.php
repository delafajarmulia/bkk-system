<?php
    // include 'process-edit.php';
    function backTo($userId, $from){
        $from = $_GET['from'];
        var_dump($userId, $from);
        switch($from){
            case 'add-lowongan':
                header("location:add-lowongan.php?user_id=$userId");
            break;
            case 'add-perusahaan':
                header("location:add-perusahaan.php?user_id=$userId");
            break;
            case 'edit-lowongan':
                $lowonganId = $_GET['lowongan_id'];
                $perusahaanId = $_GET['perusahaan_id'];
                header("location:edit-lowongan.php?user_id=$userId&&lowongan_id=$lowonganId&&perusahaan_id=$perusahaanId");
            break;
            case 'dashboard-admin':
                header("location:dashboard-admin.php?user_id=$userId");
            break;
            case 'dashboard':
                header("location:dashboard.php?user_id=$userId");
            break;
            case 'detail-info-loker':
                $lowonganId = $_GET['lowongan_id'];
                $perusahaanId = $_GET['perusahaan_id'];
                header("location:detail-info-loker.php?user_id=$userId&&lowongan_id=$lowonganId&&perusahaan_id=$perusahaanId");
            break;
            case 'pelamaran':
                $lowonganId = $_GET['lowongan_id'];
                header("location:pelamaran.php?user_id=$userId&&lowongan_id=$lowonganId");
            break;
            default:
                break;
        }
    }
?>