<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                {{-- <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul> --}}
            </div>
            {{-- search --}}

            <div class="widget-content">
               
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">Alertas</div>
                                <div class="panel-body"><br>
                                    <div class="recent-activities card alertas">
                                        <div class="card-body no-padding">
                                        @foreach($data as $alerta)
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-xs-4 date-holder text-right">
                                                    <span class="material-icons">schedule</span>
                                                    
                                                    <div class="date"> <span>{{$alerta->created_at}}</span><br>
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-xs-8 content">
                                                    {{$alerta->mensaje}}
                                                </div>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    {{-- Include Form --}}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // var elems = document.querySelectorAll('.sales');
        // var instances = M.Sidenav.init(elems, options);
    });
</script>