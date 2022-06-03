<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alert;
use Livewire\WithPagination;

class Alertas extends Component
{
    use WithPagination;
    public $pageTitle, $componentName, $search, $selected_id;
    private $pagination = 10;
    
    public function render()
    {
        $data = Alert::select('*')->paginate($this->pagination);
        return view('livewire.alertas.alertas', [
            'data' => $data,
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Alertas';
    }
}
