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
    $message .= "8) /imgidr_scalp TAHUN_BULAN_TANGGAL -> /imgidr_scalp xxxx_xx_xx (Untuk menda[atkan gambar chart harian)\n\n";

    return $message;
    }