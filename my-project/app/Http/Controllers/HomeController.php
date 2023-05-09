<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Widget;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application Admin section.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($board_id = null)
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

        return view('admin', $data);
    }
}
