@include('common.modalHead')

<div class="row">
    <div class="col-sm-12 col-d-md-8">
        <div class="form-group">
            <label for="numExpediente">Num Expediente</label>
            <input type="text" wire:model.lazy="numExpediente" class="form-control" placeholder="ej. 2022/01">
        </div>
    @error('numExpediente')<span class="text-danger er">{{ $message }}</span>@enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-d-md-8">
        <div class="form-group">
            <label for="representado">Representado</label>
            <input type="text" wire:model.lazy="representado" class="form-control" placeholder="ej. Luis Lopez">
        </div>
    @error('representado')<span class="text-danger er">{{ $message }}</span>@enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-d-md-8">
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" wire:model.lazy="descripcion" class="form-control" placeholder="">
        </div>
    @error('descripcion')<span class="text-danger er">{{ $message }}</span>@enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-d-md-8">
        <div class="form-group">
            <label for="numExpedienteJuzgado">Num Expediente Juzgado</label>
            <input type="text" wire:model.lazy="numExpedienteJuzgado" class="form-control" placeholder="ej. 2022/01">
        </div>
    @error('numExpedienteJuzgado')<span class="text-danger er">{{ $message }}</span>@enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-d-md-8">
        <div class="form-group">
            <label for="contrario">Contrario</label>
            <input type="text" wire:model.lazy="contrario" class="form-control" placeholder="">
        </div>
    @error('contrario')<span class="text-danger er">{{ $message }}</span>@enderror
    </div>
</div>


    
    
    
    



@include('common.modalFooter')