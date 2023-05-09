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

	{{ Form::model($widget, array('route' => array('widgets.update', $board_id, $widget->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('title', 'Title', ['class'=>'form-label']) }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}
		</div>
        <div class="mb-3">
            {{ Form::label('section', 'Section', ['class'=>'form-label']) }}
            {{ Form::select('section', config('app.sections'), 'S' ,['class'=> 'form-control']) }}
        </div>
		<div class="mb-3">
			{{ Form::label('type', 'Type', ['class'=>'form-label']) }}
			{{ Form::text('type', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
    </div>
@stop
