@extends('layouts.app')
@section('content')
    
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" value="{{ $task->name }}" name="name">
            </div>
            <br>
            <div class="form-group">
              <label for="description" class="form-label">Description:</label>
              <br>
              {{-- <input type="" class="form-control" id="pwd" placeholder="Enter password" name="pswd"> --}}
              <textarea name="description" id="description" cols="173">{{ $task->description }}</textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="due_at" class="form-label">Due Date:</label>
              <input type="date" class="form-control" id="date" name="due_at" value="{{ ($task->due_at) }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Task</button>
            <br>
            <br>
            <button class="btn btn-light"><a href="{{ route('tasks.index') }}">Back to Task List</a></button>
        </form>       

@endsection