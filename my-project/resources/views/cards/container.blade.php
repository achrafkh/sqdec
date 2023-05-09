<div class="{{ $container }}">
    <div class="card">
        <div class="card-header text-center">{{ $title }}</div>

        <div class="card-body">
            @foreach($widgets as $widget)
                @include(config('app.templates.'. $widget->type), ['widget' => $widget])
            @endforeach
        </div>
    </div>
</div>
