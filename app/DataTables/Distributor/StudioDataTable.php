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
            ->editColumn('membership_till', function($user) {
                $diff = $user->membershipValidity();
                if ($diff < 0) {
                    return '<label class="badge badge-danger">'.$user->membership_till.'</label>';
                } elseif ($diff < date('t')) {
                    return '<label class="badge badge-warning">'.$user->membership_till.'</label>';
                } else {
                    return '<label class="badge badge-success">'.$user->membership_till.'</label>';
                }
            })
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
        return $model->newQuery()->where('distributor_id', auth()->user()->id)->select('id', 'name', 'mobile','email', 'album_credit', 'album_created','membership_till','created_at');
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
            'album_credit',
            'album_created',
            'membership_till',
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
