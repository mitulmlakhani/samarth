<?php

namespace App\DataTables\Distributor;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class StudioDataTable extends DataTable
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
            ->addColumn('action', function($user) {
                return '<a class="btn btn-sm btn-primary" href="'. route('distributor.studio.login', $user->id) .'" target="_blank"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-primary" href="'. route('distributor.studio.edit', $user->id) .'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? Studio will be deleted !\')" href="'. route('distributor.studio.delete', $user->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['membership_till', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->where('distributor_id', auth()->user()->id)->select('id', 'name', 'mobile','email', 'created_at');
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
        return 'Studio_' . date('YmdHis');
    }
}
