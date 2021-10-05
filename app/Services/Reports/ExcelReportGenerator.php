<?php
namespace App\Services\Reports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelReportGenerator implements Igenerator{

	use GeneratorMethods;

	public function generate(array $data): void
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle($this->title);

		$cRow = 0; $cCol = 0;
		foreach ($data as $row) {
		  $cRow ++;
		  $cCol = 65; 
		  foreach ($row as $cell) {
		  	$sheet->setCellValue(chr($cCol) . $cRow, $cell);
		  	$cCol++;
		  }
		}
		$this->download($spreadsheet);
	}

	public function download(Spreadsheet $spreadsheet)
	{
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$this->fileName.'.xlsx"');
		header('Cache-Control: max-age=0');
		header('Expires: Fri, 11 Nov 2011 11:11:11 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');
		$writer->save('php://output');
	}

}