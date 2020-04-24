<?php
include "connect.php";
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB BASE</title>
    <script type="text/javascript" src="website/js/jquery.js"></script>
	<script type="text/javascript" src="photobooth_min.js"></script>
    <script type="text/javascript" src="website/js/script.js"></script>
    <link type="text/css" rel="stylesheet" media="screen" href="website/css/page.css" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="lib/bootstrap/css/main.css" rel="stylesheet" /> 
    <link href="lib/bootstrap/media/css/jquery.dataTables.min.css" rel="stylesheet" /> 
    <script type="text/javascript" language="javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="lib/bootstrap/media/js/jquery.dataTables.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style type="text/css" media="all">
    #photo {
      height: 300px;
      width: 380px;
    }
    </style> 
    <script>function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
    }
    </script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ABSENSI WAJAH WEB BASE</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">ABSEN</a></li>
      <li><a href="admin.php">ADMIN</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
ADMIN
</div>
</div>
<div class="panel-body">';
$sql    = "select * from t_absen where id='1'";
$result = $koneksi->query($sql);
$row    = $result->fetch_array();
$arrb  = array("00.00", "01.00", "02.00", "03.00", "04.00", "05.00", "06.00", "07.00",
"08.00", "09.00", "10.00", "11.00", "12.00", "13.00", "14.00", "15.00", "16.00",
"17.00", "18.00", "19.00", "20.00", "21.00", "22.00", "23.00");
echo'<form action="edit.php" method="post">
<table class="table table-condensed">
<tr><input type="hidden" name="id" value="'.$row['id'].'"/>
	<td style="width: 150px;">Masuk</td>
	<td style="width: 10px;">:</td>
	<td><select name="msk">';
    $no = 0;
    foreach($arrb as $b){
        echo '<option value="'.$no.'"';
        if($no == $row['msk']) echo' selected';
            echo '>'.$b.'</option>';
    $no++;
    }
    echo '</select></td>
</tr>
<tr>
	<td style="width: 150px;">Pulang</td>
	<td style="width: 10px;">:</td>
	<td><select name="plg">';
    $no = 0;
    foreach($arrb as $b){
        echo '<option value="'.$no.'"';
        if($no == $row['plg']) echo' selected';
            echo '>'.$b.'</option>';
    $no++;
    }
    echo '</select></td>
</tr>
<tr>
	<td style="width: 150px;">Gaji Per Jam*</td>
	<td style="width: 10px;">:</td>
	<td><input type="text" name="gpj" size="25" value="'.number_format($row['gpj'],0,",",".").'"/></td>
</tr>
<tr>
	<td style="width: 150px;">Lembur Per Jam*</td>
	<td style="width: 10px;">:</td>
	<td><input type="text" name="lpj" size="25" value="'.number_format($row['lpj'],0,",",".").'"/></td>
</tr>
<tr>
	<td style="width: 150px;">Terlambat Per Jam*</td>
	<td style="width: 10px;">:</td>
	<td><input type="text" name="tpj" size="25" value="'.number_format($row['tpj'],0,",",".").'"/></td>
</tr>
<tr>
	<td colspan="3"><h6>*Hilangkan separator (.) jika ingin mengedit</h6></td>
</tr>
<tr>
	<td colspan="3"><input type="submit" value="Edit" class="btn btn-primary"/></td>
</tr>
</table>
</form>
</div>
</div>
</div>

<div class="col-lg-12">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
DONWLOAD DATA ASBENSI KARYAWAN
</div>
</div>
<div class="panel-body">
<h3>RANGE :</h3>
<form method="post" action="excel.php">
<table class="table table-condensed" style="width:150px">
<tr>
<td>Tanggal</td>
	<td>
    <select name="tgl1">
		<option value="01"> 01 </option>
		<option value="02"> 02 </option>
		<option value="03"> 03 </option>
		<option value="04"> 04 </option>
		<option value="05"> 05 </option>
		<option value="06"> 06 </option>
		<option value="07"> 07 </option>
		<option value="08"> 08 </option>
		<option value="09"> 09 </option>
		<option value="10"> 10 </option>
		<option value="11"> 11 </option>
		<option value="12"> 12 </option>
		<option value="13"> 13 </option>
		<option value="14"> 14 </option>
		<option value="15"> 15 </option>
		<option value="16"> 16 </option>
		<option value="17"> 17 </option>
		<option value="18"> 18 </option>
        <option value="19"> 19 </option>
		<option value="20"> 20 </option>
		<option value="21"> 21 </option>
		<option value="22"> 22 </option>
		<option value="23"> 23 </option>
		<option value="24"> 24 </option>
		<option value="25"> 25 </option>
		<option value="26"> 26 </option>
		<option value="27"> 27 </option>
		<option value="28"> 28 </option>
		<option value="29"> 29 </option>
		<option value="30"> 30 </option>
		<option value="31"> 31 </option>
	</select>
    </td>
    <td>:</td>
    <td>
    <select name="tgl2">
		<option value="01"> 01 </option>
		<option value="02"> 02 </option>
		<option value="03"> 03 </option>
		<option value="04"> 04 </option>
		<option value="05"> 05 </option>
		<option value="06"> 06 </option>
		<option value="07"> 07 </option>
		<option value="08"> 08 </option>
		<option value="09"> 09 </option>
		<option value="10"> 10 </option>
		<option value="11"> 11 </option>
		<option value="12"> 12 </option>
		<option value="13"> 13 </option>
		<option value="14"> 14 </option>
		<option value="15"> 15 </option>
		<option value="16"> 16 </option>
		<option value="17"> 17 </option>
		<option value="18"> 18 </option>
        <option value="19"> 19 </option>
		<option value="20"> 20 </option>
		<option value="21"> 21 </option>
		<option value="22"> 22 </option>
		<option value="23"> 23 </option>
		<option value="24"> 24 </option>
		<option value="25"> 25 </option>
		<option value="26"> 26 </option>
		<option value="27"> 27 </option>
		<option value="28"> 28 </option>
		<option value="29"> 29 </option>
		<option value="30"> 30 </option>
		<option value="31"> 31 </option>
	</select>
    </td>
 </tr>
 <tr>
    <td>Bulan</td>
    <td>
	<select name="bln1">
		<option value="01"> 01 </option>
		<option value="02"> 02 </option>
		<option value="03"> 03 </option>
		<option value="04"> 04 </option>
		<option value="05"> 05 </option>
		<option value="06"> 06 </option>
		<option value="07"> 07 </option>
		<option value="08"> 08 </option>
		<option value="09"> 09 </option>
		<option value="10"> 10 </option>
		<option value="11"> 11 </option>
		<option value="12"> 12 </option>
	</select>
    </td>
    <td>:</td>
    <td>
	<select name="bln2">
		<option value="01"> 01 </option>
		<option value="02"> 02 </option>
		<option value="03"> 03 </option>
		<option value="04"> 04 </option>
		<option value="05"> 05 </option>
		<option value="06"> 06 </option>
		<option value="07"> 07 </option>
		<option value="08"> 08 </option>
		<option value="09"> 09 </option>
		<option value="10"> 10 </option>
		<option value="11"> 11 </option>
		<option value="12"> 12 </option>
	</select>
	</tr>
    <tr>
    <td>Tahun</td>
	<td colspan="3"><select name="thn">
        <option value="2015"> 2015 </option>
        <option value="2016"> 2016 </option>
        <option value="2017"> 2017 </option>
        <option value="2018"> 2018 </option>
        <option value="2019"> 2019 </option>
        <option value="2020"> 2020 </option>
        <option value="2021"> 2021 </option>
        <option value="2022"> 2022 </option>
        <option value="2023"> 2023 </option>
        <option value="2024"> 2024 </option>
        <option value="2025"> 2025 </option>
	</select></td>
    </tr>
    <tr>
    <td colspan="4"><input type="submit" value="Unduh" class="btn btn-primary"> </td>
    </tr>
</tr>
</table>
</form>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="panel-title">
DATA ABSEN KARYAWAN
</div>
</div>
<div class="panel-body">
<table id="dataTables" class="display table table-bordered">
<thead>
<tr>
	<th style="width: 5px;">No</th>
    <th style="width: 400px;">Nama Karyawan</th>
    <th style="width: 150px;">Tanggal</th>
    <th style="width: 100px;">Masuk</th>
    <th style="width: 100px;">Keluar</th>
    <th style="width: 150px;">Gaji</th>
</tr>
</thead>
<tbody>';
$msk = $row['msk'];
$klr = $row['plg'];
$gpj = $row['gpj'];
$lpj = $row['lpj'];
$tpj = $row['tpj'];
$query = "SELECT t_karyawan.nama, t_kry.tgmsk, t_kry.jmsk, t_kry.jklr, t_kry.id_kry
FROM t_karyawan , t_kry WHERE t_karyawan.id =  t_kry.id_kry order by t_kry.id desc";
$result = $koneksi->query($query);
$no=1;
while ($row = $result->fetch_array()){
echo'
<tr>
<td style="text-align: center;">'.$no.'</td>
    <td>'.$row['nama'].'</td>
    <td style="text-align: center;">'.date("d / m / Y",strtotime($row['tgmsk'])).'</td>
    <td style="text-align: center;">';
    $jmsk = $row['jmsk'];
    if($jmsk < "10"){
        echo '0'.number_format($row['jmsk'],2,".",".");
        } else {
        echo number_format($row['jmsk'],2,".",".");
        }
        echo '</td><td style="text-align: center;">';
    $jklr = $row['jklr'];
    if($jklr =="BELOM"){
        echo 'Belum Absen</td>
        <td>Rp. 0,00';
    }else{
    if($jklr < "10"){
        echo '0'.number_format($row['jklr'],2,".",".");
        } else {
        echo number_format($row['jklr'],2,".",".");
        }
        echo '</td>
    <td>';
       if ($jmsk > $msk ){
        $lam = $jmsk - $msk;
        $lam = $lam * $tpj;
       }else{
        $lam = 0;
       }
       
       if ($jklr > $klr ){
        $lem = $jklr - $klr;
        $lem = $lem * $lpj;
       }else{
        $lem = 0;
       }
       
       $gj = (($jklr-$jmsk)*$gpj)-$lam+$lem;
       echo 'Rp. '.number_format($gj,2,",","."); 
       /*
        if ($ > $msk ){
        $terlambat = $jmsk - $msk;
       }else{
        $terlambat = 0;
       }*/
    }
    '</td>
    </tr>';
$no++;
};
echo'</tbody>
</table> 
</div>
<div class="panel-footer">
</div>
</div>
</div>

<div class="col-lg-6">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
TRAIN
</div>
</div>
<div class="panel-body text-center">
<div id="photo"></div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
TRAIN
</div>
</div>
<div class="panel-body">
<table class="table table-condensed" style="width:150px">
<tr>
	<td style="width: 150px;">ID</td>
	<td style="width: 10px;">:</td>
	<td><input type="text" onkeypress="return isNumber(event)" class="id" size="25" /></td>
</tr>
<tr>
	<td style="width: 150px;">Nama</td>
	<td style="width: 10px;">:</td>
	<td><input type="text" class="nama" size="25" /></td>
</tr>
<tr>
     <td colspan="3" style="text-align:center;"><div id="isi">HASIL</div></td>
</tr>
</table>
</div>
</div>
</div>
';
?>
<script type="text/javascript">
$(document).ready(function(){
   //dataTableResponsive
  $('#dataTables').DataTable();
  
  $('#photo').photobooth().on("image", function (event, dataUrl) {
    $("#isi").html("<center><img src='pict/loading.gif' width='48' height='48' /></center>");
    $.post("load2.php",
        { img: dataUrl,
          id: $(".id").val(), 
          nama: $(".nama").val(), 
        },
        function(data){ $("#isi").html(data); });    
    });
    
});
</script>
<script type="text/javascript" src="website/js/hijs.js"></script>
<script type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</div>
</div>
</body>
</html>