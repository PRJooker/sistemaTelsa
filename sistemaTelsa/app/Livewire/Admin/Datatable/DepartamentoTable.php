<?php

namespace App\Livewire\Admin\Datatable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\RH\Departamentos;
use Illuminate\Database\Eloquent\Builder;

class DepartamentoTable extends DataTableComponent
{
    protected $model = Departamentos::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Área asociada", "area.name")
                ->searchable()
                ->sortable(),
            Column::make('Acciones')
                ->label(function($row){
                    return view('admin.departamentos.actions', ['departamento' => $row]);
                })
            // Column::make("Created at", "created_at")
            //     ->sortable(),
            // Column::make("Updated at", "updated_at")
            //     ->sortable(),
        ];
    }
    //solucoin para n + 1 de eloquent
    public function builder(): Builder
    {
        return Departamentos::query()->with(['area']);
    }
}
