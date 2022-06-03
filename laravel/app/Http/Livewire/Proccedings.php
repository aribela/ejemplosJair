<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Procceding;
use Livewire\WithPagination;
use App\Models\Alert;

class Proccedings extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $search, $selected_id;
    public $representado, $descripcion, $numExpediente, $numExpedienteJuzgado, $contrario;

    private $pagination = 10;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Expedientes';
    }

    public function render()
    {
        $data = Procceding::select('*')->paginate($this->pagination);

        return view('livewire.proccedings.proccedings', [
            'data' => $data,
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function store(){
        $rules = [
            'representado' => 'required',
            'descripcion'  => 'required',
            'numExpediente'  => 'required',
            'numExpedienteJuzgado'  => 'required',
           'contrario'  => 'required',
            
        ];

        $messages = [
            'representado.required' => 'El campo representado es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'numExpediente.required' => 'El campo numExpediente es requerido',
            'numExpedienteJuzgado.required' => 'El campo numExpedienteJuzgado es requerido',
            'contrario.required' => 'El campo contrario es requerido',
        ];

        $this->validate($rules, $messages);

        $expediente = Procceding::create([
            'representado' => $this->representado,
            'descripcion' => $this->descripcion,
            'numExpediente' => $this->numExpediente,
            'numExpedienteJuzgado' => $this->numExpedienteJuzgado,
            'contrario' => $this->contrario,
        ]);

        $expediente->save();

        $this->resetUI();
        $this->emit('expediente-added', 'Expediente agregado correctamente');
    }

    public function Edit($id){
        $record = Procceding::find($id);
        $this->representado = $record->representado;
        $this->descripcion = $record->descripcion;
        $this->numExpediente = $record->numExpediente;
        $this->numExpedienteJuzgado = $record->numExpedienteJuzgado;
        $this->contrario = $record->contrario;
        $this->selected_id = $id;

        $this->emit('show-modal', 'show modal!');

    }

    public function update(){
        $rules = [
            'representado' => 'required',
            'descripcion'  => 'required',
            'numExpediente'  => 'required',
            'numExpedienteJuzgado'  => 'required',
           'contrario'  => 'required',
            
        ];

        $messages = [
            'representado.required' => 'El campo representado es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'numExpediente.required' => 'El campo numExpediente es requerido',
            'numExpedienteJuzgado.required' => 'El campo numExpedienteJuzgado es requerido',
            'contrario.required' => 'El campo contrario es requerido',
        ];

        $this->validate($rules, $messages);

        $expediente = Procceding::find($this->selected_id);

        $expediente->update([
            'representado' => $this->representado,
            'descripcion' => $this->descripcion,
            'numExpediente' => $this->numExpediente,
            'numExpedienteJuzgado' => $this->numExpedienteJuzgado,
            'contrario' => $this->contrario,
        ]);

        $this->crearAlerta(2, 'Se ha actualizado el expediente ', $expediente->id);

        $this->resetUI();
        $this->emit('expediente-updated', 'Expediente actualizado correctamente');
    }

    public function resetUI(){
        $this->representado = '';
        $this->descripcion = '';
        $this->numExpediente = '';
        $this->numExpedienteJuzgado = '';
        $this->contrario = '';
        $this->selected_id = 0;
        $this->search = '';
    }

    public function crearAlerta($tipo, $mensaje, $id){
        $alert = Alert::create([
            'tipo' => $tipo,
            'mensaje' => $mensaje,
            'expededienteId' => $id,
        ]);

        $alert->save();
    }
}
