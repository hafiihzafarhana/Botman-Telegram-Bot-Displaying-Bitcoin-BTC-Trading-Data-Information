<?php
    require_once 'database/config.php';
    function scalping($tahun, $bulan, $tanggal){
        global $conn;
        $txt = '';
        $txt .= "$tahun";
        $txt .= "-";
        $txt .= "$bulan";
        $txt .= "-";
        $txt .= "$tanggal";

        $sql = "SELECT gambar FROM gambar WHERE tgl LIKE '%$txt%'";
        $resultQueryView      = mysqli_query($conn, $sql);

        $message = "";

        if ($resultQueryView->num_rows > 0) {
            while ($viewDataCatatanUser = mysqli_fetch_assoc($resultQueryView)) {
                $resultCatatanUser = (object) $viewDataCatatanUser;

                $message .= $resultCatatanUser->gambar;
            }

        }
        else{
            $message = "https://ibb.co/m03GYqW";
        }
    }

