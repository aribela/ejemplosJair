<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C;">
                            <tr>
                                <th class="table-th text-white">Num Exp</th>
                                <th class="table-th text-white">Representado</th>
                                <th class="table-th text-white">Descripcion</th>
                                <th class="table-th text-white">Num Exp Juzgado</th>
                                <th class="table-th text-white">Contrario</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $expediente)
                            <tr>
                                <td> <h6>{{$expediente->numExpediente}}</h6></td>
                                <td> <h6>{{$expediente->representado}}</h6></td>
                                <td> <h6>{{$expediente->descripcion}}</h6></td>
                                <td> <h6>{{$expediente->numExpedienteJuzgado}}</h6></td>
                                <td> <h6>{{$expediente->contrario}}</h6></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Edit"  wire:click="Edit({{$expediente->id}})" ><span class="material-icons">edit</span></a>

                                    {{-- <a href="javascript:void(0)" class="btn btn-dark" title="Delete"><span class="material-icons">delete</span></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.proccedings.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('expediente-added', msg =>{
            $("#theModal").modal('hide');
            noty(msg);
        })

        window.livewire.on('expediente-updated', msg =>{
            $("#theModal").modal('hide');
            noty(msg);
        })

        window.livewire.on('user-deleted', msg =>{
            noty(msg);
        })

        window.livewire.on('hide-modal', msg =>{
            $("#theModal").modal('hide');
        })

        window.livewire.on('show-modal', msg =>{
            $("#theModal").modal('show');
        })

        window.livewire.on('user-withsales', msg =>{
            noty(msg);
        })
    });

    function Confirm(id){
        
            swal({
                title: 'Confirmar',
                text: "¿Esta seguro de eliminar?",
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cerrar',
                cancelButtonColor: '#fff',
                confirmButtonColor: '#3B3F5C',
                confirmButtonText: 'Aceptar',
            }).then(function (result){
                if (result.value) {
                    window.livewire.emit('deleteRow', id);
                    swal.close();
                }
            });
        
    }
</script>