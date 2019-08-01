<?php

namespace App\DataTables\Studio;

use App\Models\Team;
use Yajra\DataTables\Services\DataTable;

class TeamDataTable extends DataTable
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
            ->editColumn('avatar', function($team) {
                return '<a target="_blank" href="'.url('storage/team/'.$team->avatar).'"><img src="'.url('storage/team/'.$team->avatar).'" height="30"></a>';
            })
            ->addColumn('action', function($team) {
                return '<a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? team will be deleted !\')" href="'. route('studio.team.delete', $team->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['avatar', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Team $model)
    {
        return $model->newQuery()->select('id', 'name', 'position','avatar')->where('user_id', auth()->user()->id);
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
            'name',
            'position',
            'avatar',
            'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'team_' . date('YmdHis');
    }
}
