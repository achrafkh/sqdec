<div class="{{ $container }}">
    <div class="card">
        <div class="card-header text-center">{{ $title }}</div>
        <div class="card-body p-1">
            @foreach($tasks as $task)
                @include('cards._task',['task' => $task])
            @endforeach
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#add-task">
                {{ __('Add Task') }}
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="add-task" tabindex="-1" aria-labelledby="add-task"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               @include('tasks.create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
