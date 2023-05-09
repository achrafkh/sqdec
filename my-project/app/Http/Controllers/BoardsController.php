<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Board;
use App\Http\Requests\BoardRequest;
use App\Models\Widget;
use App\Models\Task;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $boards= Board::all();
        return view('boards.index', ['boards'=>$boards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Show board
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function board($board_id = null)
    {
        $boards = Board::all();
        if($boards->count() === 0 ){
            return view('admin', []);
        }

        $data['boards'] = $boards;

        if ($board_id) {
            $data['board'] = $boards->firstWhere('id', $board_id);
            $data['widgets'] = Widget::with('board')->where('board_id', $board_id)->get()->groupBy('section');
        } else {
            $data['board'] = $boards->first();
            $data['widgets'] = Widget::with('board')->where('board_id', $data['board']->id)->get()->groupBy('section');
        }

        $data['tasks'] = Task::all();

        return view('board', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BoardRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BoardRequest $request)
    {
        $board = new Board;
		$board->title = $request->input('title');
		$board->location = $request->input('location');
		$board->timezone = $request->input('timezone');
        $board->save();

        return to_route('boards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $board = Board::findOrFail($id);
        return view('boards.show',['board'=>$board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $board = Board::findOrFail($id);
        return view('boards.edit',['board'=>$board]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BoardRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BoardRequest $request, $id)
    {
        $board = Board::findOrFail($id);
		$board->title = $request->input('title');
		$board->location = $request->input('location');
		$board->timezone = $request->input('timezone');
        $board->save();

        return to_route('boards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $board = Board::findOrFail($id);
        $board->delete();

        return to_route('boards.index');
    }
}
