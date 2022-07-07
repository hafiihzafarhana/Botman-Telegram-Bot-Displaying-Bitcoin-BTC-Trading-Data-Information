<?php
    require_once 'database/config.php';
    function lastSell($tahun, $bulan, $tanggal){
        global $conn;
        $txt = '';
        $txt .= "$tahun";
        $txt .= "-";
        $txt .= "$bulan";
        $txt .= "-";
        $txt .= "$tanggal";

        $sql = "SELECT lastsell as lastsell FROM btc WHERE tanggal LIKE '%$txt%' ORDER BY id DESC LIMIT 1";
        $resultQueryView      = mysqli_query($conn, $sql);

        $message = "";

        if ($resultQueryView->num_rows > 0) {
            while ($viewDataCatatanUser = mysqli_fetch_assoc($resultQueryView)) {
                $resultCatatanUser = (object) $viewDataCatatanUser;
                $message .= "Harga jual terakhir pada $txt : Rp " . $resultCatatanUser->lastsell . PHP_EOL;
            }

        }
        else{
            $message = "Data Masih Kosong 🙄";
        }

        return $message;
    }