<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Tasks\SimpleTask;
use App\Models\User;

class TaskTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create()
    {
    	$user = User::create(['email' => 'test@email.com', 'password' => 'password']);
    	$simpleTask = new SimpleTask();
    	$this->actingAs($user);
    	$this->assertTrue($simpleTask->createTask([
			'title' => 'test 5',
			'comment' => 'test comment5',
			'time_spent' => 5,
			'date' => \Carbon\Carbon::now()->addHours(2)
    	]));
    	$this->assertFalse($simpleTask->createTask([
			'comment' => 'test comment5',
			'time_spent' => 5,
			'date' => \Carbon\Carbon::now()->addHours(2)
    	]));
    	$this->assertDatabaseHas('tasks', [
    		'user_id' => $user->id,
    		'title' => 'test 5',
    		'comment' => 'test comment5',
			'time_spent' => 5,
		]);
    }

    public function test_get_tasks()
    {
    	$user = User::create(['email' => 'test@email.com', 'password' => 'password']);
    	$simpleTask = new SimpleTask();
    	$this->actingAs($user);
    	$this->assertTrue($simpleTask->createTask([
			'title' => 'test 5',
			'comment' => 'test comment5',
			'time_spent' => 5,
			'date' => \Carbon\Carbon::now()->addDays(2)
    	]));
    	$this->assertTrue($simpleTask->createTask([
			'title' => 'test 6',
			'comment' => 'test comment6',
			'time_spent' => 5,
			'date' => \Carbon\Carbon::now()->addDays(8)
    	]));

    	$this->assertCount(2,$simpleTask->getReportTasks(\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addDays(3)->format('Y-m-d')));
    	$this->assertCount(3,$simpleTask->getReportTasks(\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addDays(9)->format('Y-m-d')));

    }
}
