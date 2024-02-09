@extends('layouts.app')
@section('content')

<h1 style="text-align: center">Completed Tasks</h1>
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
        @foreach($completedTasks as $task)
            <tr>
              <td>{{ $task->id }}</td>
              <td>{{ $task->name }}</td>
              <td>{{ $task->description }}</td>
              <td>{{ $task->due_at }}</td>
              <td>{{ $task->status }}</td>
              <td>
                <form method="post" action="{{ route('tasks.pending', $task->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-dark">Pending</button>
                </form>
              </td>
            </tr>
        @endforeach
    </tbody>
</table>
<button class="btn btn-link"><a href="{{ route('tasks.index') }}">Back to Task List</a></button>
@endsection