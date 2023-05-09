@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('tasks.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>title</th>
				<th>asigned_user</th>
				<th>description</th>
				<th>due_date</th>

				<th style="width: 15%;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tasks as $task)

				<tr>
					<td>{{ $task->id }}</td>
					<td>{{ $task->title }}</td>
					<td>{{ $task->asigned_user }}</td>
					<td>{{ $task->description }}</td>
					<td>{{ $task->due_date }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('tasks.show', [$task->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
