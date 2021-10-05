<?php


namespace App\Services\Reports;

use \App\Services\Tasks\Itask;

/*
*
*	Class for generating tasks reports.
*
**/
class ReportCreator {
	/*
	*  concrete type of generated report (Excel, Csv, Pdf...)
	*
	*  @var App\Services\Reports\Igenerator
	*/
	protected $generator;
	/*
	*  concrete type of task type (Simple task...)
	*
	*  @var App\Services\Tasks\Itask
	*/
	protected $task;
	/*
	*  reports date range
	*
	*  @var array
	*/
	protected $dateRange = [
		'from' => '',
		'to' => ''
	];

	public function __construct(Igenerator $generator, Itask $task)
	{
		$this->generator = $generator;
		$this->task = $task;
	}

	/*
	*  set date range for generated reports
	*
	*  @param string $from from which date data should be reported
	*  @param string $to to which date data should be reported
	*
	*  @return ReportCreator
	*/
	public function setDateRange(string $from, string $to): ReportCreator
	{
		$this->dateRange['from'] = $from;
		$this->dateRange['to'] = $to;
		return $this;
	}

	/*
	*  set title for report file
	*
	*  @param string $title
	*
	*  @return ReportCreator
	*/
	public function setTitle(string $title): ReportCreator
	{
		$this->generator->setTitle($title);
		return $this;
	}

	/*
	*  set file name of reported file
	*
	*  @param string $title
	*
	*  @return ReportCreator
	*/
	public function setFileName(string $fileName): ReportCreator
	{
		$this->generator->setFileName($fileName);
		return $this;
	}


	/*
	*  set concrete task type
	*
	*  @param \App\Services\Tasks\Itask $task
	*
	*  @return ReportCreator
	*/
	public function setTask(Itask $task): ReportCreator
	{
		$this->task = $task;
		return $this;
	}

	/*
	*  set concrete generator type
	*
	*  @param \App\Services\Tasks\Itask $task
	*
	*  @return ReportCreator
	*/
	public function setGenerator(Igenerator $generator): ReportCreator
	{
		$this->generator = $generator;
		return $this;
	}

	/*
	*  generate report
	*
	*  @return void
	*/
	public function generate(): void
	{
		$data = $this->task->getReportTasks($this->dateRange['from'], $this->dateRange['to']);
		$this->generator->generate($data);
	}
}