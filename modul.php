<?php
$con = mysqli_connect('localhost', 'admin_sirhuka', 'giLang123!', 'admin_sirhuka') or die('Gagal');


function cek_data($kode)
{
    global $con;
    $data =  mysqli_query($con, "SELECT * FROM post where post_id='$kode'") or die('Query Gagal');
    $jum = mysqli_num_rows($data);
    if ($jum >= 1) {
        return false;
    } else {
        $q = "INSERT INTO post values(NULL,$kode)";
        mysqli_query($con, $q) or die('Query Gagal ' . $q);
        return true;
    }
}