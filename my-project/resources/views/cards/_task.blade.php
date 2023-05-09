<div role="button" class="card p-0 mt-2 @if(Carbon\Carbon::now($board->timezone)->lt($task->due_date)) border-success @else border-danger @endif" data-bs-toggle="modal" data-bs-target="#task-{{$task->id}}">
    <div class="card-body p-1">

        <div> Title: {{ $task->title  }}</div>
        <div> User: {{ $task->asigned_user  }}</div>
        {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id] , 'class' => 'text-center']) !!}
        {!! Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-sm', 'type'=>'submit']) !!}
        {!! Form::close() !!}
    </div>
</div>
<div class="modal fade" id="task-{{$task->id}}" tabindex="-1" aria-labelledby="add-task"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div> Title: {{ $task->title  }}</div>
                <div> User: {{ $task->asigned_user  }}</div>
                <div> Due Date: {{ $task->due_date  }}</div>
                <div> Description: <br>{{ $task->description  }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
