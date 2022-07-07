<?php
    function cmd(){
    $message = '';
    $message .= "Command : \n";
    $message .= "1) /bantu (Untuk mengetahui fitur bot)\n\n";
    $message .= "2) /harga TAHUN_BULAN_TANGGAL -> /harga xxxx_xx_xx (Untuk melihat harga IDR dan harga USD)\n\n";
    $message .= "3) /volume TAHUN_BULAN_TANGGAL -> /volume xxxx_xx_xx (untuk melihat volume IDR dan volume USD)\n\n";
    $message .= "4) /lastbuy TAHUN_BULAN_TANGGAL -> /lastbuy xxxx_xx_xx (Untuk mengetahui harga beli terakhir)\n\n";
    $message .= "5) /lastsell TAHUN_BULAN_TANGGAL -> /lastsell xxxx_xx_xx (Untuk mengetahui harga jual terakhir)\n\n";
    $message .= "6) /imgidr (Untuk mengetahui seluruh chart grafik IDR)\n\n";
    $message .= "7) /imgusd (Untuk mengetahui seluruh chart grafik USD)\n\n";
    $message .= "8) /day_trade TAHUN_BULAN_TANGGAL -> /day_trade xxxx_xx_xx (Untuk mendapatkan gambar chart harian)\n\n";
    $message .= "9) /range_trade TAHUN1_BULAN1_TANGGAL1 & TAHUN2_BULAN2_TANGGAL2 -> /range_trade xxxx_xx_xx & xxxx_xx_xx (Untuk mendapatkan grafik berdasarkan rentang hari)\n\n";
    $message .= "10) /range_trade_day TAHUN1_BULAN1_TANGGAL1 - JAM1_MENIT1_DETIK1 & TAHUN2_BULAN2_TANGGAL2 - JAM2_MENIT2_DETIK2 -> /range_trade_day xxxx_xx_xx - xxxx_xx_xx & xxxx_xx_xx - xxxx_xx_xx (Untuk mendapatkan grafik berdasarkan rentang waktu hari dan jam)\n\n";
    return $message;
    }