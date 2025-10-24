<?php

namespace App\Livewire\Admin\Datatable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\RH\Empleados;
use Illuminate\Database\Eloquent\Builder;

class EmpleadoTable extends DataTableComponent
{
    protected $model = Empleados::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function builder(): Builder
    {
        return Empleados::query()
        ->with(['puesto'])
        ->selectRaw("empleados.*, CONCAT(name, ' ', apellido_ap, ' ' , apellido_ma) as nombre_completo");
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre completo", "name")
                ->searchable()
                ->sortable(),
            // Column::make("Name", "name")
            //     ->searchable()
            //     ->sortable(),
            // Column::make("Apellido Pa", "apellido_ap")
            //     ->sortable(),
            // Column::make("Apellido ma", "apellido_ma")
            //     ->sortable(),
            // Column::make("Curp", "curp")
            //     ->sortable(),
            Column::make("Rfc", "rfc")
                ->sortable(),
            Column::make("Seguro social", "seguro_social")
                ->sortable(),
            // Column::make("Direccion", "direccion")
            //     ->sortable(),
            // Column::make("Municipio", "municipio")
            //     ->sortable(),
            // Column::make("Estado", "estado")
            //     ->sortable(),
            Column::make("Telefono", "telefono")
                ->sortable(),
            Column::make("Puesto id", "puesto_id")
                ->sortable(),
                  Column::make('Acciones')
                ->label(function($row){
                    return view('admin.empleados.actions', ['empleado' => $row]);
                })
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }

}
