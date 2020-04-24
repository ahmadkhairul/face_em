<?php
include "connect.php";
$t1 = $_POST['tgl1'];
$t2 = $_POST['tgl2'];
$b1 = $_POST['bln1'];
$b2 = $_POST['bln2'];
$th = $_POST['thn'];

$sql    = "select * from t_absen where id='1'";
$result = $koneksi->query($sql);
$row    = $result->fetch_array();
$msk = $row['msk'];
$klr = $row['plg'];
$gpj = $row['gpj'];
$lpj = $row['lpj'];
$tpj = $row['tpj'];
$query = "SELECT t_karyawan.nama, t_kry.tgmsk, t_kry.jmsk, t_kry.jklr, t_kry.id_kry
FROM t_karyawan , t_kry WHERE t_karyawan.id = t_kry.id_kry and t_kry.tgmsk BETWEEN '$th-$b1-$t1' AND '$th-$b2-$t2'";
$result1 = $koneksi->query($query);

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/lib/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Ahmad")
							 ->setLastModifiedBy("Ahmad")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

// Set lebar kolom
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);

//Mengeset Syle nya
$titleStylenya = new PHPExcel_Style();
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$titleStylenya->applyFromArray(
	array('fill' 	   => array(
		  'type'       => PHPExcel_Style_Fill::FILL_SOLID,
          'color'      => array('argb' => 'FFFFFFFF')),
          'borders'    => array(
                          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						  'right'  => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						  'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						  'top'	   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  ),
          'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
          'font'      => array(
                         'bold'    => true,
                         'size'    => 12,
                         'name'    => 'Cambria'
                         )
	));

$headerStylenya->applyFromArray(
	array('fill' 	   => array(
		  'type'       => PHPExcel_Style_Fill::FILL_SOLID,
          'color'      => array('argb' => 'FFEEEEEE')),
          'borders'    => array(
                          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						  'right'  => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						  'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						  'top'	   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  ),
          'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
          'font'      => array(
                         'bold'    => true,
                         'size'    => 12,
                         'name'    => 'Cambria'
                         )
	));
	
$bodyStylenya->applyFromArray(
	array('fill' 	=> array(
		  'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
		  'color'	=> array('argb' => 'FFFFFFFF')),
          'borders' => array(
						'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
						'left'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top'	    => array('style' => PHPExcel_Style_Border::BORDER_THIN)
		  ),
          'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
          'font'      => array(
                         'size'    => 10,
                         'name'    => 'Cambria'
                         )
    ));

$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
$objPHPExcel->getActiveSheet()->setSharedStyle($titleStylenya, "A1");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP KEHADIRAN DAN GAJI KARYAWAN DARI TANGGAL $t1/$b1/$th AND $t2/$b2/$th");
$objPHPExcel->getActiveSheet()->setSharedStyle($headerStylenya, "A2:G2");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', 'No')
            ->setCellValue('B2', 'ID')
            ->setCellValue('C2', 'Nama Karyawan')
            ->setCellValue('D2', 'Tanggal')
            ->setCellValue('E2', 'Jam Masuk')
            ->setCellValue('F2', 'Jam Keluar')
            ->setCellValue('G2', 'Gaji');

// $i = Numbering, $e = Row Styling, $o = Cell Value
$i=1;
$e=2;
$o=3;

// Pengulangan
while($row1=$result1->fetch_array()){
    
// Rumus Gaji
$jmsk = $row1['jmsk'];
$jklr = $row1['jklr'];
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

//Pencetakan
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$o, $i)
            ->setCellValue('B'.$o, $row1['id_kry'])
            ->setCellValue('C'.$o, $row1['nama'])
            ->setCellValue('D'.$o, date("d/m/Y",strtotime($row1['tgmsk'])))
            ->setCellValue('E'.$o, "'".$row1['jmsk'].".00")               
            ->setCellValue('F'.$o, "'".$row1['jklr'].".00")  
            ->setCellValue('G'.$o, $gj);
$e++;
$o++;
$i++;
}

$objPHPExcel->getActiveSheet()->setSharedStyle($bodyStylenya, "A3:G$e");

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Border

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="exportkaryawan '.$t1.$b1.$th.' - '.$t2.$b2.$th.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
// */
?>