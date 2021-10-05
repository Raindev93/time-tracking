<?php 
namespace App\Services\Reports;

use App\Services\Reports\Igenerator;



trait GeneratorMethods{

	private $fileName = 'excel_report';
	private $title = 'tracking app';

	public function setFileName(string $name): Igenerator
	{
		$this->fileName = str_replace(' ', '_', strtolower($name));
		return $this;
	}

	public function setTitle(string $title): Igenerator
	{
		$this->title = $title;
		return $this;
	}
}