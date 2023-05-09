@extends('default')

@section('content')
    <div class="card p-2">
        <div class="mb-3 d-flex justify-content-between">
            <span><a href="/admin/{{ $board_id  }}" class="btn btn-info">Back to Board</a></span>
            <span><a href="widgets/create" class="btn btn-info">Create</a></span>
        </div>

        @foreach($widgetGroup as $key => $widgets)
            <h3>{{ config('app.sections.'.$key) }}</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>title</th>
                    <th>type</th>
                    <th>Section</th>

                    <th style="width: 15%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($widgets as $widget)
                    <tr>
                        <td>{{ $widget->title }}</td>
                        <td>{{ $widget->type }}</td>
                        <td>{{ config('app.sections')[$widget->section] ?? '' }}</td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('widgets.edit', [$board_id, $widget->id]) }}" class="btn btn-primary">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['widgets.destroy', $board_id ,$widget->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@stop
