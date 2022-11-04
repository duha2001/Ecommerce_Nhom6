<?php 
	
	// PHPExcel
  	include('Classes/PHPExcel.php');
  	// connect database
  	require_once('../config.php');

  	// export file excel
  	$objExcel = new PHPExcel;
  	$objExcel->setActiveSheetIndex(0);
  	$sheet = $objExcel->getActiveSheet()->setTitle('Nhật ký sử dụng khoa');
  	// dinh dang file excel
  	// - dinh dang cho du kich thuoc noi dung
  	$sheet->getColumnDimension("A")->setAutoSize(true);
  	$sheet->getColumnDimension("B")->setAutoSize(true);
  	$sheet->getColumnDimension("C")->setAutoSize(true);
  	$sheet->getColumnDimension("D")->setAutoSize(true);
  	$sheet->getColumnDimension("E")->setAutoSize(true);
  	$sheet->getColumnDimension("F")->setAutoSize(true);
  	$sheet->getColumnDimension("G")->setAutoSize(true);
  	$sheet->getColumnDimension("H")->setAutoSize(true);
    $sheet->getColumnDimension("I")->setAutoSize(true);
  	// chinh mau dong title
  	$sheet->getStyle('A1:I1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
  	// canh giua
  	$sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  	// dem so dong
  	$rowCount = 1;
  	// set cho dong dau tien (dong tieu de)
  	$sheet->setCellValue('A' . $rowCount, 'STT');
  	$sheet->setCellValue('B' . $rowCount, 'Phòng');
  	$sheet->setCellValue('C' . $rowCount, 'Ngày');
  	$sheet->setCellValue('D' . $rowCount, 'Giờ vào');
    $sheet->setCellValue('E' . $rowCount, 'Giờ ra');
  	$sheet->setCellValue('F' . $rowCount, 'Mục đích/môn học');
  	$sheet->setCellValue('G' . $rowCount, 'Tình trạng trước khi sử dụng');
  	$sheet->setCellValue('H' . $rowCount, 'Tình trạng sau khi sử dụng');
  	$sheet->setCellValue('I' . $rowCount, 'Người sử dụng');

  	// do du lieu tu db
    $id = $_GET["id"];
  	$sql = "SELECT phongtructhuoc.tenP,nhatkysudung.ngaysudung, 
      nhatkysudung.giovao, nhatkysudung.giora,nhatkysudung.mucdichsudung,
      nhatkysudung.tinhtrangtruocsudung, nhatkysudung.tinhtrangsausudung,
      nhatkysudung.giangviensudung FROM nhatkysudung,phongtructhuoc 
      where phongtructhuoc.id_tructhuoc = nhatkysudung.id_tructhuoc 
      AND tenP = (SELECT tenP FROM phongtructhuoc where id_tructhuoc = ".$id.") ORDER BY id DESC";
  	$result = mysqli_query($conn, $sql);
  	$stt = 0;
  	while ($row = mysqli_fetch_array($result)) 
  	{
  		// do du lieu tang len theo cac cot
  		$rowCount++;
  		$stt++;
          $date_cre = date_create($row['ngaysudung']);
          $hienthi = date_format($date_cre, 'd/m/Y');
  		// do het du lieu ra cac dong
  		$sheet->setCellValue('A' . $rowCount, $stt);
	  	$sheet->setCellValue('B' . $rowCount, $row['tenP']);
	  	$sheet->setCellValue('C' . $rowCount, $hienthi);
	  	$sheet->setCellValue('D' . $rowCount, $row['giovao']);
        $sheet->setCellValue('E' . $rowCount, $row['giora']);
	  	$sheet->setCellValue('F' . $rowCount, $row['mucdichsudung']);
	  	$sheet->setCellValue('G' . $rowCount, $row['tinhtrangtruocsudung']);
	  	$sheet->setCellValue('H' . $rowCount, $row['tinhtrangsausudung']);
	  	$sheet->setCellValue('I' . $rowCount, $row['giangviensudung']);
  	}

  	// tao border
  	$styleArray = array(
  		'borders' => array(
  			'allborders' => array(
  				'style' => PHPExcel_Style_Border::BORDER_THIN
  			)
  		)
  	);
  	$sheet->getStyle('A1:' . 'I'.($rowCount))->applyFromArray($styleArray);

  	// tao tac xuat file
  	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
  	$filename = 'nhat-ky-khoa.xlsx';
  	$objWriter->save($filename);

  	// cau hinh khi xuat file
  	header('Content-Disposition: attachment; filename="' .$filename. '"'); // tra ve file kieu attachment
  	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
  	header('Content-Legth: ' . filesize($filename));
  	header('Content-Transfer-Encoding: binary');
  	header('Cache-Control: must-revalidate');
  	header('Pragma: no-cache');
  	readfile($filename);
  	return;

?>