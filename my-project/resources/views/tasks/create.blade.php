@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

{!! Form::open(['route' => 'tasks.store']) !!}

<div class="mb-3">
    {{ Form::label('title', 'Title', ['class'=>'form-label']) }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('asigned_user', 'Asigned user', ['class'=>'form-label']) }}
    {{ Form::text('asigned_user', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('description', 'Description', ['class'=>'form-label']) }}
    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('due_date', 'Due date', ['class'=>'form-label']) }}
    {{ Form::date('due_date', Carbon\Carbon::now(), array('class' => 'form-control')) }}
</div>


<div class="float-end">
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
</div>

{{ Form::close() }}
