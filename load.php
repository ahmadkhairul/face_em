<?php

date_default_timezone_set("Asia/Jakarta");
include "connect.php";
$idk = $_POST['idk'];
$jam = date('H');
$tgl = date('Y-m-d');
//$bln = date('m');
//$thn = date('Y');
$query = "select * from t_kry where id_kry='$idk' and tgmsk='$tgl'";
$result = $koneksi->query($query);
$row = mysqli_num_rows($result);
$raw = $result->fetch_array();
if ($row == 0){
    $query1 = "insert into t_kry values (NULL,'$idk','$tgl','$jam','BELOM')";
    $res = $koneksi->query($query1);
    if ($res){ 
        echo "Absensi Sukses Selamat Datang";
        }else{ 
        echo 'Absensi Gagal';
        }
} else if ($row == 1){
    $id = $raw['id'];
    $query2 = "select * from t_kry where id='$id'";
    $result2 = $koneksi->query($query2);
    $raw2 = $result2->fetch_array();
    $jklr = $raw2['jklr'];
    if ($jklr=="BELOM"){ 
        $query3 = "update t_kry set jklr='$jam' where id='$id'";
        $res3 = $koneksi->query($query3);
         if ($res3){ 
            echo "Absensi Sukses Selamat Pulang";
            }else{ 
            echo 'Absensi Gagal';
            }
    }else{ 
         echo 'Anda sudah melaksanakan absensi untuk hari ini';
         }
}
?>            