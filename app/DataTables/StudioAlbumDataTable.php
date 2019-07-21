<?php

namespace App\DataTables;

use App\Models\Album;
use Yajra\DataTables\Services\DataTable;

class StudioAlbumDataTable extends DataTable
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
            ->editColumn('thumb_image', function($album) {
                return '<a target="_blank" href="'.$album->thumb_url.'"><img src="'.$album->thumb_url.'" height="30"></a>';
            })
            ->rawColumns(['thumb_image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Album $model)
    {
        $query = $model->newQuery()->select('id', 'remark', 'mobile', 'pin', 'thumb_image', 'created_at');
        return $query;
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
            'remark',
            'mobile',
            'pin',
            'thumb_image',
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
