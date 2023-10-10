<?php

namespace App\DataTables;

use App\Models\TempUser;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TempUsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($user) {
                $url = route('user.approval',[$user]);
                //return '<form action="route()" method="POST"><input type="hidden" class="form-control" id="userId" name="userId"> '
                return '<a href="'.$url.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Approve</a>';
            })
            ->setRowId('id');
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TempUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TempUser $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tempusers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
                  Column::make(['data' => 'name', 'name' => 'name', 'title' => 'Nama']),
                  Column::make(['data' => 'no_ic', 'name' => 'no_ic', 'title' => 'No. Kad Pengenalan']),
                  Column::make(['data' => 'email', 'name' => 'email', 'title' => 'Emel']),
                  Column::make(['data' => 'jabatan_id', 'name' => 'jabatan_id', 'title' => 'Jabatan']),
                  Column::make(['data' => 'jawatan_id', 'name' => 'jawatan_id', 'title' => 'Jawatan']),
                  Column::make(['data' => 'status_pengguna_id', 'name' => 'status_pengguna_id', 'title' => 'Aktif/Tidak Aktif']),
                  Column::computed('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'TempUsers_' . date('YmdHis');
    }
}
