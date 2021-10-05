<?php

namespace App\Services\Tasks;

use App\Services\Tasks\Tasks;
use App\Services\Reports\ExcelReportGenerator;
use App\Services\Reports\ReportCreator;

/*
*
*	Concrete type of task.
*
**/
class SimpleTask extends Tasks implements Itask {
	
	/*
	*  set eloquent model of task to perform operations on database
	*
	*  @param array $data associative array where all keys should be same as database fields
	*
	*  @return array prepared data that can be inserted to DB
	*  @throws Exception if field is not found in $data array
	*/
	public function setModel(): void
	{
		$this->model = new \App\Models\Task;
	}

	/*
	*  get paginated table
	*
	*  @param int $onPage how many tasks should be displayed on page
	*
	*  @return string paginated table with tasks
	*/
	public function getTasksTable(int $onPage): string
	{
		$tasks = $this->paginatedTasks($onPage);

		return view('dashboard.tasks.simpleTask', ['tasks' => $tasks]);
	}

	/*
	*  generate excel file with tasks on selected date range
	*
	*  @param string $from from which date data should be reported
	*  @param string $to to which date data should be reported
	*
	*  @return void
	*/
	public function generateExcel(string $from, string $to): void
	{
		$reportCreator = new ReportCreator(new ExcelReportGenerator(), $this);
		$reportCreator
			->setDateRange($from, $to)
			->setFileName('New report created')
			->generate();
	}
}

