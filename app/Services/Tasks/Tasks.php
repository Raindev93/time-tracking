<?php

namespace App\Services\Tasks;

use App\Services\Tasks\Task;

/*
*
*	Abstract class that provides default methods for creating, displaying and reporting tasks.
*
**/
abstract class Tasks{

	/*
	*  Eloquent model of task to perform operations on database
	*
	*  @var Illuminate\Database\Eloquent\Model
	*/
	protected $model;

	public function __construct()
	{
		$this->setModel();
	}

	/*
	*  Get fields that are required to insert, update and get data from database
	*
	*/
	protected function getRequiredFields(): array
	{
		return $this->model->getFillable();
	}

	/*
	*  Prepare data before inserting to database, also check if all required fields are available
	*
	*  @param array $data associative array where all keys should be same as database fields
	*
	*  @return array prepared data that can be inserted to DB
	*  @throws Exception if field is not found in $data array
	*/
	protected function prepareData(array $data): array
	{
		$requiredFields = $this->getRequiredFields();
		$prepared = [];
	
		foreach($requiredFields as $field){
			if($field == 'user_id') continue;
			if(!array_key_exists($field, $data)){
				throw new \Exception('invalid data');
			}
			$prepared[$field] = $data[$field];
		}

		$prepared['user_id'] = \Auth::user()->id;
		return $prepared;
	}

	/*
	*  Store new task in DB
	*
	*  @param array $data associative array where all keys should be same as database fields
	*
	*  @return bool
	*/
	public function createTask(array $data): bool
	{
		try{
			$prepared = $this->prepareData($data);
		} catch(\Exception $e){
			return false;
		}
		$this->model->create($prepared);
		return true;
	}

	/*
	*  Get data for report generators
	*
	*  @param string $dateFrom from which date data should be reported
	*  @param string $dateTo to which date data should be reported
	*
	*  @return array data that will be reported
	*/
	public function getReportTasks(string $dateFrom, string $dateTo): array 
	{
		$dateFrom = \Carbon\Carbon::parse($dateFrom);
		$dateTo = \Carbon\Carbon::parse($dateTo);
		$tasks = $this->model::where('user_id', \Auth::user()->id)->where('date','<',$dateTo)->where('date','>',$dateFrom)->get();
		$data = [];
		$requiredFields = $this->getRequiredFields();
		
		$data[] = $requiredFields;
		foreach($tasks as $task){
			$tmp = [];
			foreach($requiredFields as $field){
				$tmp[] = $task->{$field};
			}
			$data[] = $tmp;
		}
		return $data;
	}

	/*
	*  Get paginated tasks
	*
	*  @param string $onPage how many tasks should be displayed on page
	*
	*  @return \Illuminate\Pagination\LengthAwarePaginator paginated data
	*/
	public function paginatedTasks(int $onPage): \Illuminate\Pagination\LengthAwarePaginator
	{
		return $this->model::where('user_id', \Auth::user()->id)->paginate($onPage);
	}
}