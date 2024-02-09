@extends('layouts.app')
@section('content')

      <h1 style="text-align: center">Create Task</h1>

      <form action="{{ route('tasks.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your title here" name="name" required>
          </div>
          <br>
          <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <br>
            {{-- <input type="" class="form-control" id="pwd" placeholder="Enter password" name="pswd"> --}}
            <textarea name="description" id="description" cols="173" placeholder="Enter your description here"></textarea>
          </div>
          <br>
          <div class="form-group">
            <label for="due_at" class="form-label">Due Date:</label>
            <input type="date" class="form-control" id="date" name="due_at">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection