<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index',["tasks"=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'taskN' => ['required','max:50'],
            'level' => 'required',
        ],[
            'taskN.required' => "the name of task is required"
        ]);
        $task = new Task();
        $task->name = $request->taskN;
        $task->level = $request->level;
        $task->save();
        $tasks = Task::all();
        return redirect()->route('tasks.index', ['tasks' => $tasks])
                         ->with('success','task has been added successfully');
        ;

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return  view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
            $request->validate([
                'taskN' => ['required','max:50'],
                'level' => 'required',
            ],[
                'taskN.required' => "the name of task is required"
            ]);
            $tasks = Task::all();
            $task->fill($request->post())->save();

            return redirect()->route('tasks.index',['tasks' => $tasks])->with('edit','Task Has Been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('delete','Task has been deleted successfully');
    }
}
