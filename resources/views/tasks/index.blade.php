@extends('layouts.app')
@section('content')

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <h1 style="text-align: center" style="">Task Management System</h1>
        <h2>Task List</h2>

        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
            <a href="{{ route('tasks.completed') }}" class="btn btn-secondary">Show Completed Tasks</a>
        </div>
        <table class="table table-bordered mt-3">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                      <td>{{ $task->id }}</td>
                      <td>{{ $task->name }}</td>
                      <td>{{ $task->description }}</td>
                      <td>{{ $task->due_at }}</td>
                      <td>{{ $task->status }}</td>
                      <td>
                        <!-- Edit Button -->
                        <form method="get" action="{{ route('tasks.edit', $task->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                    
                        <!-- Complete Button -->
                        <form method="post" action="{{ route('tasks.complete', $task->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-dark">Complete</button>
                        </form>
                    
                        <!-- Delete Button -->
                        <form method="post" action="{{ route('tasks.destroy', $task->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection