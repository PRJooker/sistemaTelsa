<?php

namespace App\Livewire\Admin\Datatable;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\RH\Areas;

class AreaTable extends DataTableComponent
{
    protected $model = Areas::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'asc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre del área", "name")
                ->searchable()
                ->sortable(),
            // Column::make("Fecha de creación", "created_at")
            //     ->sortable(),
            Column::make('Acciones')
                ->label(function($row){
                    return view('admin.areas.actions', ['area' => $row]);
                })
        ];
    }
}
