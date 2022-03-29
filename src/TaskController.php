<?php

namespace Bsadjetey\Todoey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bsadjetey\Todoey\Task;

class TaskController extends Controller
{
    public function index()
    {
        return redirect()->route('task.create');
    }

    public function create()
    {
        $tasks = Task::all();
        $submit = 'Add';
        return view('msystems.todoey.list', compact('tasks', 'submit'));
    }

    public function store(Request $request)
    {
        $input = $request->except(["_token"]);
        Task::create($input);
        return redirect()->route('task.create');
    }

    public function edit($id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = 'Update';
        return view('msystems.todoey.list', compact('tasks', 'task', 'submit'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except(["_token"]);
        $task = Task::findOrFail($id);
        $task->update($input);
        return redirect()->route('task.create');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.create');
    }
}
