<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_akademik";

    $koneksi = new mysqli($server, $username, $password, $database);
    if (!$koneksi) {
        echo "Koneksi Gagal: ";
    }
?>