@extends('layout')
@section('content')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="success">
                {{$message}}
            </div>
        @endif
        @if ($message = Session::get('edit'))
            <div class="edit">
                {{$message}}
            </div>
        @endif
        @if ($message = Session::get('delete'))
            <div class="delete">
                {{$message}}
            </div>
        @endif
        <div class="container-header">
            <h1>CRUD APP <span>LARAVEL 9</span></h1>
            <button> <a href="{{route('tasks.create')}}">Add new</a> </button>
        </div>

        <div class="container-body">
            <table>
                <tr>

                    <th>Name</th>
                    <th>level</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->name}}</td>
                        <td style="color : {{$task->level == "hard" ? "red" : ($task->level == "easy" ? "green" : "orange")}}">{{$task->level}}</td>
                        <td class="edit-container">
                            <a href="{{route('tasks.edit',$task->id)}}" class="edit-link"/>edit</a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{route('tasks.destroy',$task->id)}}" method="Post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="delete-link">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>


@endsection
