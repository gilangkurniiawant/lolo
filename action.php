<?php
 require_once('modul/modul.php');
 //include('modul.php');
 $base = "http://neg.loolmy.com";
echo "\n";
echo "\e[94m      BOT LOOLMY            \n";
echo "\e[91m  BY AST - BY SIRHUKA.COM             \n";
echo "\e[93m SPOTIFY PREMIUM RP.100.000 -> SPOTIFY.MY.ID   \n";
echo "\n";
echo "\e[96m[?] Masukkan Kode Reff : ";
$reff = trim(fgets(STDIN));
echo "\e[96m[?] Masukkan Delay(Detik) : ";
$delay = trim(fgets(STDIN));
while(true){
 $dofasnkj = rand(1,60);
 regis($reff);
 sleep($delay);
}
function regis($reff="04a9573a"){
  global $base;
    $nama = rawurlencode(gen_nama());
  if(rand(0,100)<50){
  $uid = rand(111111,999999).rand(111111,999999).rand(1111,999999);
  $type ="facebook";
  $img="https%3A%2F%2Fplatform-lookaside.fbsbx.com%2Fplatform%2Fprofilepic%2F%3Fasid%3D$uid%26height%3D200%26width%3D200%26ext%3D1579172831%26hash%3DAeQk3b70YU6Zgr2b";
  } else{
  $uid = rand(111111,999999).rand(111111,999999).rand(111111,999999).rand(111,99999);
  $type ="google";
  $img_kode= gen_string(46);
  $img="https%3A%2F%2Flh3.googleusercontent.com%2Fa-%2F".$img_kode;
 
  }
$load = "name=$nama&username=$uid&password=$uid&type=$type&image=$img";
$d['url']=$base."/api/user/register/4F5A9C3D9A86FA54EACEDDD635185/78a1e86d-860c-41c5-b350-79d83f572d63/";
$d['data']=$load;
$d['header']="accept-encoding: gzip, deflate
cache-control: no-cache
content-type: application/x-www-form-urlencoded
host: neg.loolmy.com
user-agent: okhttp/3.3.1";
$is = curl($d);
$r = json_decode($is['result'],true);
if($r['message']=="You have successfully registered"){
  $token = $r['values'][5]["value"];  
  $id = $r['values'][0]["value"];  
  $d['url']=$base."/api/user/code/4F5A9C3D9A86FA54EACEDDD635185/78a1e86d-860c-41c5-b350-79d83f572d63/";
  $d['data']="user=$id&key=$token&code=$reff";
  $is = curl($d);
  $r = json_decode($is['result'],true);
  if($r['message']=="Thank You to Join us . The Reference code has been registered"){
    echo "\n Berhasil! Nama : ".urldecode($nama)." - Reff By $type \n";
  }
}else{
  return false;
  die();
}
}
//Auto View
/*
$x=1;
view($x);
*/
function view($x){
global $base;
$encode = get_data($x);
$d['url']=$base."/api/status/add/view/4F5A9C3D9A86FA54EACEDDD635185/78a1e86d-860c-41c5-b350-79d83f572d63/";
$d['data']="id=$encode&user=2561&key=0061df813c6b70f4504545f6d8d3b7e046713103";
$d['header']="accept-encoding: gzip, deflate
cache-control: no-cache
content-type: application/x-www-form-urlencoded
host: neg.loolmy.com
user-agent: okhttp/3.3.1";
$is = curl($d);
$response = $is['result'];
  if(strlen($response)<10){
    echo "\nData - ID : $encode \n";
  }else{
    echo "Gagal";
  }
}
    
?>
