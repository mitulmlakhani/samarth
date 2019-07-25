<?php

namespace App\DataTables\Studio;

use App\Models\Service;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
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
            ->editColumn('service_image', function($service) {
                return '<a target="_blank" href="'.url('storage/service/'.$service->service_image).'"><img src="'.url('storage/service/'.$service->service_image).'" height="30"></a>';
            })
            ->addColumn('action', function($service) {
                return '<a class="btn btn-sm btn-danger" onclick="return confirm(\'Are you Sure ? service will be deleted !\')" href="'. route('studio.service.delete', $service->id) .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            })
            ->rawColumns(['service_image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Service $model)
    {
        return $model->newQuery()->select('id', 'name','description', 'service_image');
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
            'description',
            'service_image',
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
        return 'service_' . date('YmdHis');
    }
}
