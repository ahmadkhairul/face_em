<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '00000000';
$dbname = 'db_absen';
 
$koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 
# check koneksi
if( $koneksi->connect_error )
{
	die('Oops!! koneksi Gagal : '. $koneksi->connect_error );
}
?>