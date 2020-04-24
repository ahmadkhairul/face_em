<?php
include "connect.php";
$id  = $_POST['id'];
$msk = $_POST['msk'];
$plg = $_POST['plg'];
$gpj = $_POST['gpj'];
$lpj = $_POST['lpj'];
$tpj = $_POST['tpj'];
$sql = "update t_absen set msk='$msk', plg='$plg', gpj='$gpj', lpj='$lpj', tpj='$tpj' where id='$id'";
$result = $koneksi->query($sql);
if ($result){
?> <script>alert('UPDATE PENGATURAN SUKSES');setTimeout("location.href='admin.php'", 1);</script> <?php
}else{   
?> <script>alert('UPDATE PENGATURAN GAGAL');setTimeout("location.href='admin.php'", 1);</script> <?php
}
?>