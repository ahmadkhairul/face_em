<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";

$dataUrl = $_POST['img']; 
$dataUrlParts = explode( ",", $dataUrl);
$data = base64_decode($dataUrlParts[1]);
/**/

include("Kairos.php");

$app_id = "7c3fc6ca";
$app_key = "1851e2cc9e3aba6cf0a8af4d054c6c7a";

$kairos = new Kairos($app_id, $app_key);

// Koding enroll()
// $image      = $dataUrl;
// $subject_id = 'nirwan';
// $gallery_name = 'karyawan';
// $argumentArray =  array(
//    "image" => $image,
//    "subject_id" => $subject_id,
//    "gallery_name" => $gallery_name
// );
// $response   = $kairos->enroll($argumentArray);

// $response = $kairos->viewGalleries();

$image      = $dataUrl;
$gallery_name = 'karyawan';
$argumentArray =  array(
    "image" => $image,
    "gallery_name" => $gallery_name
);

$response   = $kairos->recognize($argumentArray);

$isi = explode(",", $response);
$cek = explode('"', $response);

if(!empty($isi[4])) {
$isi2 = explode('"', $isi[4]);    
}

if(in_array("Errors", $cek) or empty($response) or in_array("No match found", $cek)) {
    $info = "";
    if(in_array("no faces found in the image", $cek)) {
        $info = "Wajah Tidak di Temukan";die;
    }
    
    echo "<br>Terjadi Kesalahan ".$info.", Silakan Coba Kembali";die;
} else {
    $idk = $isi2[3];
    $jam = date('H');
    $tgl = date('Y-m-d');
    //$bln = date('m');
    //$thn = date('Y');
    $query4 = "select * from t_karyawan where id='$idk'";
    $result4 = $koneksi->query($query4);
    $row4 = $result4->fetch_array();
    
    $query = "select * from t_kry where id_kry='$idk' and tgmsk='$tgl'";
    $result = $koneksi->query($query);
    $row = mysqli_num_rows($result);
    $raw = $result->fetch_array();
    
    $nama = $row4['nama'];
    $id = $raw['id'];
        if ($row == 0){
            $query1 = "insert into t_kry values (NULL,'$idk','$tgl','$jam','BELOM')";
            $res = $koneksi->query($query1);
            if ($res){ 
                echo 'Absensi Sukses Selamat Datang '.$nama;
            }else{ 
                echo 'Absensi Gagal'.$nama;
            }
        } else if ($row == 1){
            $query2 = "select * from t_kry where id='$id'";
            $result2 = $koneksi->query($query2);
            $raw2 = $result2->fetch_array();
            $jklr = $raw2['jklr'];
            if ($jklr=="BELOM"){ 
                $query3 = "update t_kry set jklr='$jam' where id='$id'";
                $res3 = $koneksi->query($query3);
                 if ($res3){ 
                    echo 'Absensi Sukses Selamat Pulang '.$nama;
                 }else{ 
                    echo 'Absensi Gagal'.$nama;
                    }
            }else{ 
            echo 'Anda sudah melaksanakan absensi untuk hari ini '.$nama;
            }
        }
}
//$isi = explode(",", $response);
//$isi2 = explode('"', $isi[4]);

//echo '<br>Selamat Datang '.$isi2[3];
// print_r($response);

?>