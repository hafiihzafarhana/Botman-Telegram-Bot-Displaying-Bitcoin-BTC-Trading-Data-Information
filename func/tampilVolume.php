<?php
    require_once 'database/config.php';
    function tampilVolum($tahun, $bulan, $tanggal){
        global $conn;
        $txt = '';
        $txt .= "$tahun";
        $txt .= "-";
        $txt .= "$bulan";
        $txt .= "-";
        $txt .= "$tanggal";
        $sql = "SELECT MAX(volidr) as volmaxidr, MAX(volusdt) as volmaxusd, MIN(volusdt) as volminidr, MIN(volidr) as volminidr FROM btc WHERE tanggal != '0000-00-00 00:00:00' AND tanggal LIKE '%$txt%'";
        $resultQueryView      = mysqli_query($conn, $sql);

        $message = "";

        if ($resultQueryView->num_rows > 0) {
            while ($viewDataCatatanUser = mysqli_fetch_assoc($resultQueryView)) {
                $resultCatatanUser = (object) $viewDataCatatanUser;

                print_r($resultCatatanUser);
                $message .= "Pada tanggal : $txt\n";
                $message .= "Volume IDR Tertinggi   : " . $resultCatatanUser->volmaxidr . PHP_EOL;
                $message .= "Volume IDR Terendah   : " . $resultCatatanUser->volminidr . PHP_EOL;
                $message .= "Volume USD Tertinggi   : " . $resultCatatanUser->volmaxusd . PHP_EOL;
                $message .= "Volume USD Terendah   : " . $resultCatatanUser->volminidr . PHP_EOL;
            }

        }
        else{
            $message = "Data Masih Kosong 🙄";
        }

        return $message;
    }