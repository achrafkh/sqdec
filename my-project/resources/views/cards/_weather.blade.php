<div class="card child mb-3 mt-3 custom-card">
    <div class="card-header text-center">
        {!! Form::open(['method' => 'DELETE','route' => ['widgets.destroy', $board->id, $widget->id] , 'class' => 'text-center']) !!}
        {!! Form::button($widget->title. ' <i class="fa fa-trash-o"></i>', ['class' => 'btn btn-sm', 'type'=>'submit']) !!}
        {!! Form::close() !!}
    </div>
    <div class="card-body p-0" data-widget="{{ $widget->toJson() }}" data-bs-toggle="modal"
         data-bs-target="#widget-{{ $widget->id }}">
        <span id="sparkline-{{ $widget->id }}"></span>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary full-width" data-bs-toggle="modal"
                data-bs-target="#widget-{{ $widget->id }}">
            Expand
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="widget-{{ $widget->id }}" tabindex="-1" aria-labelledby="widget-{{ $widget->id }}"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $widget->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="chart-container-{{ $widget->id }}" style="width: 100%;height: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var chart;

    var board = {!! $widget->board->toJson()  !!};
    var timeZone = `&timezone=${encodeURIComponent(board.timezone)}`;
    var apiUrl = 'https://api.open-meteo.com/v1/forecast?latitude=50.12&longitude=8.68&daily=temperature_2m_max,windspeed_10m_max&current_weather=true&forecast_days=16' + timeZone;

    $(document).ready(function () {
        $.getJSON(apiUrl, function (data) {
            let $sparkElement = $("#sparkline-{{ $widget->id }}");
            $sparkElement.sparkline(data.daily.temperature_2m_max, {
                type: 'line',
                width: '100%',
                height: '70px',
                fillColor: undefined,
                lineWidth: 1,
                spotRadius: 1
            });
            $sparkElement.sparkline(data.daily.windspeed_10m_max, {
                composite: 'true',
                lineColor: '#ff0000',
            });
        });
    });

    $('#widget-{{ $widget->id }}').on('shown.bs.modal', function () {
        $.getJSON(apiUrl, function (data) {
            Highcharts.setOptions({
                time: {
                    timezone: board.timezone
                }
            });
            if (typeof chart !== 'undefined') {
                chart.destroy();
            }

            chart = Highcharts.chart('chart-container-{{ $widget->id }}', {
                chart: {
                    zoomType: 'xy'
                },
                title: {
                    text: 'Weather Forecast',
                    align: 'center'
                },
                subtitle: {
                    text: 'Source: https://open-meteo.com',
                    align: 'center'
                },
                xAxis: {
                    labels: {
                        allowOverlap: true
                    },
                    categories: data.daily.time
                },
                yAxis: [{
                    labels: {
                        format: '{value}' + data.daily_units.temperature_2m_max
                    },
                    title: {
                        text: 'Max Temperature'
                    }
                }, {
                    labels: {
                        format: '{value}' + data.daily_units.windspeed_10m_max
                    },
                    title: {
                        text: 'Max WindSpeed'
                    },
                    opposite: true
                }],
                tooltip: {
                    shared: true
                },
                series: [{
                    name: 'Temperature',
                    type: 'spline',
                    data: data.daily.temperature_2m_max,
                    tooltip: {
                        valueSuffix: '°C'
                    }
                }, {
                    name: 'WindSpeed',
                    type: 'spline',
                    yAxis: 1,
                    data: data.daily.windspeed_10m_max,
                    tooltip: {
                        valueSuffix: 'km/h'
                    }
                }]
            });
        });
    })
</script>
