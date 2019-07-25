<?php

namespace App\DataTables\Studio;

use App\Models\Portfolio;
use Yajra\DataTables\Services\DataTable;

class PortfolioDataTable extends DataTable
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
            ->editColumn('portfolio_image', function($portfolio) {
                return '<a target="_blank" href="'.url('storage/portfolio/'.$portfolio->portfolio_image).'"><img src="'.url('storage/portfolio/'.$portfolio->portfolio_image).'" height="30"></a>';
            })
            ->addColumn('action', function($portfolio) {
                return '<a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? Portfolio will be deleted !\')" href="'. route('studio.portfolio.delete', $portfolio->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['portfolio_image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Portfolio $model)
    {
        return $model->newQuery()->select('id', 'category', 'portfolio_image');
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
            'category',
            'portfolio_image',
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
        return 'Portfolio_' . date('YmdHis');
    }
}
