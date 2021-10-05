<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'comment' => 'required|min:2',
            'date' => 'required',
            'time_spent' => 'required'
        ]);
        $data = $request->all();

        $data['date'] = \Carbon\Carbon::parse($data['date']);
        
        $simpleTask = new \App\Services\Tasks\SimpleTask;
        if($simpleTask->createTask($data)){
            return [
                'status' => 1
            ];
        }
        return [
                'status' => 0
            ];
        
    }

    public function getReport(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from'
        ]);
        $simpleTask = new \App\Services\Tasks\SimpleTask;
        $simpleTask->generateExcel($request->from, $request->to);
    }

    public function taskTable()
    {
        $simpleTask = new \App\Services\Tasks\SimpleTask;
        return $simpleTask->getTasksTable(15);   
    }
}
