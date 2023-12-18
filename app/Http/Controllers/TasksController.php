<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        return response(Task::all()->jsonSerialize(), Response::HTTP_OK);
    }

   public function show(Task $task)
    {
        return response($task->jsonSerialize(), Response::HTTP_OK);
    } 

    
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return response($task->jsonSerialize(), Response::HTTP_OK);
    }

    public function store()
    {
        $task = Task::create([
            'title' => request('title'),
            'description' => request('description')
        ]);

        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, Response::HTTP_OK);
    }
}
