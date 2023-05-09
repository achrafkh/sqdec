<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks= Task::all();
        return view('tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request)
    {
        $task = new Task;
		$task->title = $request->input('title');
		$task->asigned_user = $request->input('asigned_user');
		$task->description = $request->input('description');
		$task->due_date = $request->input('due_date');
        $task->save();

        return to_route('home.boards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
		$task->title = $request->input('title');
		$task->asigned_user = $request->input('asigned_user');
		$task->description = $request->input('description');
		$task->due_date = $request->input('due_date');
        $task->save();

        return to_route('home.boards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return to_route('home.boards');
    }
}
