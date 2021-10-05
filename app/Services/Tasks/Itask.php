<?php

namespace App\Services\Tasks;
use Illuminate\Database\Eloquent\Model;

interface Itask{
	public function setModel(): void;
	public function createTask(array $data): bool;
	public function getTasksTable(int $onPage): string;
	public function getReportTasks(string $dateFrom, string $dateTo): array;
}