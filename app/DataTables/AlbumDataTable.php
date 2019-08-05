<?php

namespace App\DataTables;

use App\Models\Album;
use Yajra\DataTables\Services\DataTable;

class AlbumDataTable extends DataTable
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
            ->addColumn('action', function($album) {
                return '<a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? Album will be deleted !\')" href="'. route('admin.album.delete', $album->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->editColumn('thumb_image', function($album) {
                return '<a target="_blank" href="'.$album->thumb_image.'"><img src="'.$album->thumb_image.'" height="125"></a>';
            })
            ->rawColumns(['thumb_image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Album $model)
    {
        $query = $model->newQuery()->join('users', 'users.id', '=', 'albums.user_id')->select('albums.id', 'users.name', 'albums.remark', 'albums.mobile', 'albums.pin', 'albums.thumb_image', 'albums.created_at');
        if(isset($_GET['studioId']) && $_GET['studioId']){
            $query = $query->where('albums.user_id', $_GET['studioId']);
        }
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
            [
               'name' => 'users.name',
               'title' => 'Studio',
               'data' => 'name',
            ],
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
