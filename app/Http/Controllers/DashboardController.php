<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
		$simpleTask = new \App\Services\Tasks\SimpleTask();

    	$tasks = $simpleTask->getTasksTable(15);
    	return view('dashboard.dashboard', ['tasks' => $tasks]);
    }

    public function generateExcel(Request $request)
    {
    	$from = $request->from ?? '';
    	$to = $request->to ?? '';
		$simpleTask = new \App\Services\Tasks\SimpleTask();

	    $tasks = $simpleTask->generateExcel();
    }
}
