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

	{!! Form::open(['route' => ['widgets.store', $board_id]]) !!}

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
            {{ Form::select('type', ['weather' => 'Weather Widget', 'custom' => 'Custom'], 'DE' ,['class'=> 'form-control']) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
    </div>

@stop