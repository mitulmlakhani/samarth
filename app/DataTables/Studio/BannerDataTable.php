<?php

namespace App\DataTables\Studio;

use App\Models\Banner;
use Yajra\DataTables\Services\DataTable;

class BannerDataTable extends DataTable
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
            ->editColumn('banner_image', function($banner) {
                return '<a target="_blank" href="'.url('storage/banner/'.$banner->banner_image).'"><img src="'.url('storage/banner/'.$banner->banner_image).'" height="30"></a>';
            })
            ->addColumn('action', function($banner) {
                return '<a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? banner will be deleted !\')" href="'. route('studio.banner.delete', $banner->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['banner_image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banner $model)
    {
        return $model->newQuery()->select('id', 'title', 'banner_image');
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
            'id',
            'title',
            'banner_image',
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
        return 'banner_' . date('YmdHis');
    }
}
