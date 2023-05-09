@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">{{ __('Huddle Boards') }}</div>

        <div class="card-body">
            <label for="active-board">Select Board</label>
            <div class="active-board">
                <select class="form-control select-board mw-100" id="activeBoard">
                    @foreach($boards as $boardData)
                        <option @if($boardData->id == $board->id) selected
                                @endif value="{{$boardData->id}}">{{$boardData->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Active Board</div>
        <div class="card-body">
            <div class="row">
                @if(isset($board))
                    @include('template._board', ['col' => 'col-sm-2', 'board' => $board, 'widgets' => $widgets])
                @endif

                @include('cards._tasks', [
                    'container' => 'col-sm-2 main-column',
                    'title' => 'Tasks'
                ])
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#activeBoard').change(function () {
                let board = $(this).val();
                if (board === null) {
                    return;
                }

                window.location.href = window.location.origin + '/board/' + board;
            });
        });
    </script>
@endsection
