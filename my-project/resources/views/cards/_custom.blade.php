<div class="card child mb-3 mt-3 custom-card" data-widget="{{ $widget->toJson()  }}">
    <div class="card-header text-center">{{ $widget->title }}
        {!! Form::open(['method' => 'DELETE','route' => ['widgets.destroy', $board->id, $widget->id] , 'class' => 'text-center']) !!}
        {!! Form::button($widget->title. ' <i class="fa fa-trash-o"></i>', ['class' => 'btn btn-sm', 'type'=>'submit']) !!}
        {!! Form::close() !!}
    </div>
    <div class="card-body">
            This is a Custom widget that can be developed further
    </div>
</div>
