<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Models\Note;

class NotesController extends Controller
{
    public function index(Task $task)
    {
        return response($task->notes->jsonSerialize(), Response::HTTP_OK);
    }

    public function show(Task $task, Note $note)
    {
        return response($note->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request, Task $task, Note $note)
    {
        $note->update($request->all());

        return response($note->jsonSerialize(), Response::HTTP_OK);
    }

    public function store(Task $task)
    {
        $note = Note::create([
            'description' => request('description'),
            'task_id' => $task->id
        ]);

        return response($note->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function destroy(Task $task, Note $note)
    {
        $note->delete();

        return response(null, Response::HTTP_OK);
    }

}
