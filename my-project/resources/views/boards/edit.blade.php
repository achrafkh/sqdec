@extends('default')

@section('content')
    <div class="card p-2">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        {{ Form::model($board, array('route' => array('boards.update', $board->id), 'method' => 'PUT')) }}

        <div class="mb-3">
            {{ Form::label('title', 'Title', ['class'=>'form-label']) }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
        </div>
        <div class="mb-3">
            {{ Form::label('location', 'Location', ['class'=>'form-label']) }}
            {{ Form::select('location', ['DE' => 'Germany', 'PL' => 'Poland'], 'DE' ,['class'=> 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('timezone', 'Timezone', ['class'=>'form-label']) }}
            {{ Form::select('timezone', ['Europe/Berlin' => 'Europe/Berlin', 'Europe/Warsaw' => 'Europe/Warsaw'], 'Europe/Warsaw' ,['class'=> 'form-control']) }}
        </div>

        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@stop
