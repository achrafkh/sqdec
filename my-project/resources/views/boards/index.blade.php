@extends('default')

@section('content')
    <div class="card p-2">
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('boards.create') }}" class="btn btn-info">Create</a></div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Timezone</th>

                <th style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($boards as $board)

                <tr>
                    <td>{{ $board->title }}</td>
                    <td>{{ $board->location }}</td>
                    <td>{{ $board->timezone }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('boards.edit', [$board->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['boards.destroy', $board->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@stop
