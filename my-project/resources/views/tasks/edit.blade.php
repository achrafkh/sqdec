@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

{{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}

<div class="mb-3">
    {{ Form::label('title', 'Title', ['class'=>'form-label']) }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('asigned_user', 'Asigned_user', ['class'=>'form-label']) }}
    {{ Form::text('asigned_user', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('description', 'Description', ['class'=>'form-label']) }}
    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('due_date', 'Due_date', ['class'=>'form-label']) }}
    {{ Form::string('due_date', null, array('class' => 'form-control')) }}
</div>

{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
