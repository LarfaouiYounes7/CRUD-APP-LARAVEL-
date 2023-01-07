@extends('layout')
@section('content')

    <div class="container">
        <div class="container-edit-task">
            <h1>EDIT <span>TASK</span></h1>
        </div>

        <form  method="post" action="{{route('tasks.update',$task->id)}}" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-25">
                    <label for="fname">Task Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="taskN" placeholder="Task name.." value="{{$task->name}}">
                    @error('taskN')
                    <span class="error-msg">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="col-25">Task level</div>
                <div class="col-75">
                    <select id="level" name="level" value="hard">
                        <option value="easy"  {{ $task->level === "easy" ? "selected" : "" }}>easy</option>
                        <option value="medium" {{ $task->level === "medium" ? "selected" : "" }}>medium</option>
                        <option value="hard"  {{ $task->level === "hard" ? "selected" : "" }}>hard</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>

@endsection
