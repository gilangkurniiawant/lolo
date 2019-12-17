<?php
$con = mysqli_connect('localhost', 'root', '', 'loolmy') or die('Gagal');



function get_data($x=1){
    global $con;
    $no = 641+$x;
    $data =  mysqli_query($con, "SELECT * FROM post where no='$no'") or die('Query Gagal');
    $data = mysqli_fetch_assoc($data);
    return base64_encode($data['post_id']);

}

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