<?php

namespace App\DataTables;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                if (auth()->guard('admin')->user()->hasPermission('roles-update')) {
                    $btn = '<a href="'.route('admin.roles.edit', $row->id).'" type="button" class="btn btn-icon btn-primary edit"><span class="tf-icons mdi mdi-circle-edit-outline mdi-24px"></span></a> &nbsp';
                } else {
                    $btn = '<button  type="button" class="btn btn-icon btn-primary btn-fab demo disabled"><i data-feather="edit"></i></button>';
                }

                if (auth()->guard('admin')->user()->hasPermission('roles-delete')) {
                    $btn = $btn.
                        '<form class="delete"  action="'.route('admin.roles.destroy', $row->id).'"  method="POST" id="delform"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" id="token" value="'.csrf_token().'">
                    <button type="submit" class="btn btn-icon btn-danger" title=" '.'Delete'.' "><span class="tf-icons mdi mdi-delete-empty mdi-24px"></span></button>
                        </form>';
                } else {
                    $btn = $btn.'<button class="btn btn-icon btn-danger disabled"><span class="tf-icons mdi mdi-delete-empty mdi-24px"></span></button>';
                }

                return $btn;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Role $model): QueryBuilder
    {
        return $model->query()->WithoutRoleSuperAdmin(['super_admin'])->with('permissions');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('admin-main-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->addClass('text-center')->orderable(false)->searchable(false),
            Column::make('name')->title(__('admin.name'))->addClass('text-center'),
            Column::computed('action')->title(__('admin.action'))->exportable(false)->printable(false)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Role_' . date('YmdHis');
    }
}
