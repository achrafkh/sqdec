@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">{{ __('Huddle Boards') }}</div>

                    <div class="card-body">
                        @if(isset($board))
                            <label for="active-board">Select Board</label>
                        @endif
                        <div class="active-board">
                            @if(isset($board))
                                <select class="form-control select-board" id="activeBoard">
                                    @foreach($boards as $boardData)
                                        <option @if($boardData->id == $board->id) selected
                                                @endif value="{{$boardData->id}}">{{$boardData->title}}</option>
                                    @endforeach
                                </select>
                            @endif
                            <a href="{{ route('boards.index') }}" class="btn btn-primary">Manage Boards</a>
                        </div>
                    </div>
                </div>
                @if(isset($boards))
                    <div class="card">
                        <div class="card-header">
                            <span class="align-bottom lh-lg">{{ __('Widgets') }}</span>
                            <button type="button" id="add-widget" class="btn btn-success float-end">Add Widget</button>
                        </div>
                        <div class="card-body">
                            <div class="row container-card">
                                @if(isset($board))
                                    @include('template._board', ['col' => 'col', 'board' => $board, 'widgets' => $widgets])
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
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

                window.location.href = window.location.origin + '/admin/' + board;
            });
            $('#add-widget').click(function (e) {
                e.preventDefault();
                let board = $('#activeBoard').val();

                if (board === null) {
                    return;
                }

                window.location.href = window.location.origin + '/' + board + '/widgets';
            })
        });
    </script>
@endsection
