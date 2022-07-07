<?php
    require_once 'database/config.php';
    function tampilHarga($tahun, $bulan, $tanggal){
        global $conn;
        $txt = '';
        $txt .= "$tahun";
        $txt .= "-";
        $txt .= "$bulan";
        $txt .= "-";
        $txt .= "$tanggal";
        $sql = "SELECT MAX(hargaidr) as maxidr, MAX(hargausdt) as maxusd, MIN(hargausdt) as minusd, MIN(hargaidr) as minidr FROM btc WHERE tanggal != '0000-00-00 00:00:00' AND tanggal LIKE '%$txt%'";
        $resultQueryView      = mysqli_query($conn, $sql);

        $message = "";

        if ($resultQueryView->num_rows > 0) {
            while ($viewDataCatatanUser = mysqli_fetch_assoc($resultQueryView)) {
                $resultCatatanUser = (object) $viewDataCatatanUser;

                $message .= "Pada tanggal : $txt\n";
                $message .= "Harga IDR Tertinggi   : Rp " . $resultCatatanUser->maxidr . PHP_EOL;
                $message .= "Harga IDR Terendah   : Rp " . $resultCatatanUser->minidr . PHP_EOL;
                $message .= "Harga USD Tertinggi   : $ " . $resultCatatanUser->maxusd . PHP_EOL;
                $message .= "Harga USD Terendah   : $ " . $resultCatatanUser->minusd . PHP_EOL;
            }
        }
        else{
            $message = "Data Masih Kosong 🙄";
        }

        return $message;
    }