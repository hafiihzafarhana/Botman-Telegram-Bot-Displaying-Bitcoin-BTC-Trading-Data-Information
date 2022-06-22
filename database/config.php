<?php 

// function connDB() {

   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "mybot_1";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

   if(!$conn) {
         die('Koneksi gagal: ');
   }

//    mysqli_select_db($conn, $dbName);

//    return $conn;
// }