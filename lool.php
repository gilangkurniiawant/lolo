<?php

$jum = file_get_contents('jum.json');
$jum = "55464739";
$encode = base64_encode($jum);


$data = $jum-1;
$save = fopen("jum.json", "w");
fputs($save, $data);
fclose($save);

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://neg.loolmy.com/api/status/add/view/4F5A9C3D9A86FA54EACEDDD635185/78a1e86d-860c-41c5-b350-79d83f572d63/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "id=$encode&user=2561&key=0061df813c6b70f4504545f6d8d3b7e046713103",
  CURLOPT_HTTPHEADER => array(
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "host: neg.loolmy.com",
    "user-agent: okhttp/3.3.1"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  if(strlen($response)<10){
    $data = $jum ;
    include('modul.php');
    If(cek_data($data)){
      echo "\nData Baru! Berhasil Disimpan - ID : $data \n";
    } else{
      echo "\nData Lama! - ID : $data \n";
    }
  }else{
    echo "Gagal";
  }
  
}

    
   // sleep(3);

?>