<?php

namespace App\Http\Controllers;

use App\SubTask;
use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::all();

        return view('home', ['tasks' => $tasks]);
    }

    public function taskAction(int $taskId)
    {
        $task = Task::find($taskId);

        if (!$task) {
            die('404');
        }

        $subTasks = SubTask::where('task_id', $taskId)->get();

        return view('task', ['task' => $task, 'subTasks' => $subTasks]);
    }

    public function subTaskCheck(int $subTaskId, Request $request)
    {

    }
}
