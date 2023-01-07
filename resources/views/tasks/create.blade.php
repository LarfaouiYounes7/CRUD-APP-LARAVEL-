@extends('layout')
@section('content')

<div class="container">
    <div class="container-add-task">
        <h1>ADD <span>NEW</span></h1>
    </div>

    <form method="post" action="{{route('tasks.store')}}">
    @csrf
    <div class="row">
        <div class="col-25">
            <label for="fname">Task Name</label>
        </div>
        <div class="col-75">
            <input type="text" id="fname" name="taskN" placeholder="Task name..">
            @error('taskN')
            <span class="error-msg">{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-25">Task level</div>
        <div class="col-75">
            <select id="level" name="level">
                <option value="easy">easy</option>
                <option value="medium">medium</option>
                <option value="hard" >hard</option>
            </select>
        </div>
    </div>

    <div class="row">
        <input type="submit" value="Create">
    </div>
</form>
</div>

@endsection
