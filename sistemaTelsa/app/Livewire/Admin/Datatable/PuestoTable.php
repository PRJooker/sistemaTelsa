<?php

namespace App\Livewire\Admin\Datatable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\RH\Puestos;
use Illuminate\Database\Eloquent\Builder;

class PuestoTable extends DataTableComponent
{
    protected $model = Puestos::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                 ->searchable()
                ->sortable(),
            // Column::make("Descripcion puesto", "descripcion_puesto")
            //     ->sortable(),
            Column::make("Num plazas", "num_plazas")
                ->sortable(),
            Column::make("Salario puesto", "salario_puesto")
                ->sortable(),
            Column::make("Departamento", "departamento.name")
                ->searchable()
                ->sortable(),
                  Column::make('Acciones')
                ->label(function($row){
                    return view('admin.puestos.actions', ['puesto' => $row]);
                })
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Puestos::query()->with(['departamento']);
    }
}
