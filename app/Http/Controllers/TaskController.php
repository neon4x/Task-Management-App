<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view("index", compact('tasks'));
    }

    public function create()
    {
        $statuses = [
            [
                "label" => "Todo",
                "value" => "Todo",
            ],
            [
                "label" => "Done",
                "value" => "Done",
            ]
        ];
        return view("create", compact('statuses'));
    }

    public function edit($id)
    {
        $task =Task::findOrFail($id);
        $statuses = [
            [
                "label" => "Todo",
                "value" => "Todo",
            ],
            [
                "label" => "Done",
                "value" => "Done",
            ]
        ];
        return view("edit", compact('statuses', 'task'));
    }

    public function store (Request  $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('index');    
    }

    public function update (Request  $request, $id)
    {
        $task =Task::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('index');    
    }

    public function destroy($id)
    {
        $task =Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');    
    }
}


