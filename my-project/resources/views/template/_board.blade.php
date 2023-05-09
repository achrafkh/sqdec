@include('cards.container', [
    'container'=> "main-column $col",
    'title'=> config('app.sections')['S'],
    'widgets'=> $widgets['S'] ?? []
])

@include('cards.container', [
    'container'=> "main-column $col",
    'title'=> config('app.sections')['Q'],
    'widgets'=> $widgets['Q'] ?? []
])

@include('cards.container', [
    'container'=> "main-column $col",
    'title'=> config('app.sections')['D'],
    'widgets'=> $widgets['D'] ?? []
])

@include('cards.container', [
    'container'=> "main-column $col",
    'title'=> config('app.sections')['E'],
    'widgets'=> $widgets['E'] ?? []
])

@include('cards.container', [
    'container'=> "main-column $col",
    'title'=> config('app.sections')['C'],
    'widgets'=> $widgets['C'] ?? []
])