<?php
    require_once 'database/config.php';
    function lastBuy($tahun, $bulan, $tanggal){
        global $conn;
        $txt = '';
        $txt .= "$tahun";
        $txt .= "-";
        $txt .= "$bulan";
        $txt .= "-";
        $txt .= "$tanggal";

        $sql = "SELECT lastbuy as lastb FROM btc WHERE tanggal LIKE '%$txt%' ORDER BY id DESC LIMIT 1";
        $resultQueryView      = mysqli_query($conn, $sql);

        $message = "";

        if ($resultQueryView->num_rows > 0) {
            while ($viewDataCatatanUser = mysqli_fetch_assoc($resultQueryView)) {
                $resultCatatanUser = (object) $viewDataCatatanUser;
                $message .= "Harga beli terakhir pada $txt : Rp " . $resultCatatanUser->lastb . PHP_EOL;
            }

        }
        else{
            $message = "Data Masih Kosong 🙄";
        }

        return $message;
    }