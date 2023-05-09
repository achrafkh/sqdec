<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Widget;
use App\Http\Requests\WidgetRequest;

class WidgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index($board_id)
    {
        $widgetGroup = Widget::where('board_id', $board_id)->get()->groupBy('section');

        return view('widgets.index', ['widgetGroup' => $widgetGroup, 'board_id' => $board_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create($board_id)
    {
        return view('widgets.create', ['board_id' => $board_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WidgetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($board_id, WidgetRequest $request)
    {
        $widget = new Widget;
        $widget->board_id = $board_id;
        $widget->title = $request->input('title');
        $widget->section = $request->input('section');
        $widget->type = $request->input('type');
        $widget->save();

        return to_route('widgets.index', ['board_id' => $board_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $widget = Widget::findOrFail($id);
        return view('widgets.show', ['widget' => $widget]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($board_id, $id)
    {
        $widget = Widget::findOrFail($id);
        return view('widgets.edit', ['board_id' => $board_id, 'widget' => $widget]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WidgetRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(WidgetRequest $request, $board_id, $id)
    {
        $widget = Widget::findOrFail($id);
        $widget->title = $request->input('title');
        $widget->section = $request->input('section');
        $widget->type = $request->input('type');
        $widget->save();

        return to_route('widgets.index', ['board_id' => $board_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($board_id, $id)
    {
        $widget = Widget::findOrFail($id);
        $widget->delete();

        return to_route('home', ['board_id' => $board_id]);
    }
}
