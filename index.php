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
    <script type="text/javascript" language="javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="website/css/page.css" />
    <link rel="stylesheet" href="lib/chosen/chosen.css" type="text/css" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="lib/bootstrap/css/main.css" rel="stylesheet" /> 
    <style type="text/css" media="all">
    #photo {
      height: 300px;
      width: 380px;
    }
    </style> 
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
<div class="col-lg-8">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
ABSEN
</div>
</div>
<div class="panel-body text-center">
<div id="photo"></div>
</div>
 </div>
 </div>
 <div class="col-lg-4">
<div class="panel panel-primary" id="panel">
<div class="panel-heading">
<div class="panel-title">
HASIL
</div>
</div>
<div class="panel-body">
<table class="table table-condensed">
<tr>
<tr>
        <td style="text-align:center;"><div id="isi">Hasil</div></td>
</tr>
<tr>
        <td>Jika wajah anda tidak terdeteksi silahkan absen menggunakan menu dibawah ini:</td>
</tr>
	<td style="width: 150px;"><select class="chosen-select" style="width:300px;">';
        $sql = "SELECT * from t_karyawan";
        $res = $koneksi->query($sql);
        echo'<option value=""> </option>';
        while ($raw = $res->fetch_array()){
            echo'<option value="'.$raw['id'].'">'.$raw['id'].' '.$raw['nama'].'</option>';
        };
        echo'</select></td>
</tr>
<tr>
        <td><button type="button" class="btn btn-primary" id="btn">Absen</button></td>
</tr>
</table>
 </div>
 </div>
 </div>
 </div>';
?>
<script src="lib/chosen/chosen.jquery.js" type="text/javascript"></script>  
<script src="lib/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript"> 
$(document).ready(function(){  
var file = null;
   
$('#photo').photobooth().on("image", function (event, dataUrl) {
$("#isi").html("<center><img src='pict/loading.gif' width='48' height='48' /></center>");
    $.post("load1.php",
    { img: dataUrl, },
    function(data){ ("#isi").html(data); });    
});

var config = {
  '.chosen-select' : { allow_single_deselect:true, no_results_text:'Data tidak ditemukan!', 
                       search_contains:true, placeholder_text_single:'Pilih nama anda'},
}
 
for (var selector in config) {
$(selector).chosen(config[selector]);
}

$("#btn").click(function(){
$("#isi").html("<center><img src='pict/loading.gif' width='48' height='48' /></center>");
            $.post("load.php",
                {
                    idk: $(".chosen-select").val(),                   
                },
            function(data){
                $("#isi").html(data);
            });
}); 
});
</script> 
<script src="website/js/hijs.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

