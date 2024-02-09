<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }   

    public function create()
    {
        return view("tasks.create");
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_at = $request->due_at;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_at = $request->due_at;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function complete(Task $task)
    {
        $task->update(['status' => 'completed']);

        return redirect()->route('tasks.index')->with('success', 'Task completed successfully');
    }

    public function completedTasks()
    {
        $completedTasks = Task::where('status', 'completed')->get();

        return view('tasks.completed', compact('completedTasks'));
    }

    public function pending(Task $task)
    {
        $task->update(['status' => 'pending']);

        return redirect()->route('tasks.index')->with('success', 'Task marked as pending');
    }
}
