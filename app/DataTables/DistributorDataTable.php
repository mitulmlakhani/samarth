<?php

namespace App\DataTables;

use App\Models\Distributor;
use Yajra\DataTables\Services\DataTable;

class DistributorDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($distributor) {
                return '<a class="btn btn-sm btn-primary" href="'. route('admin.distributor.edit', $distributor->id) .'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? Distributor will be deleted !\')" href="'. route('admin.distributor.delete', $distributor->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            });
        }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Distributor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Distributor $model)
    {
        return $model->newQuery()->select('distributors.id', 'distributors.name', 'distributors.mobile', 'distributors.email', 'distributors.created_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '180px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'mobile',
            'email',
            'created_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Distributor_' . date('YmdHis');
    }
}
