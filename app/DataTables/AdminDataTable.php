<?php

namespace App\DataTables;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('role_id', function ($query) {
                $roles = $query->roles()->first();

                return $roles->name;
            })
            ->editColumn('active', function ($query) {
                $checked = '';
                if ($query->active) {
                    $checked = 'checked';
                }

                return '
              <label class="switch switch-square switch-lg">
                <input type="checkbox" class="switch-input" data-id="'.$query->id.'" data-url = "'.route(
                        'admin.admins.active',
                        $query->id
                    ).'" id="check" data-massage = "'.__('admin.statuschange').'" '.$checked.'/>
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
            ';
            })
            ->addColumn('action', function ($row) {

                if (auth()->guard('admin')->user()->hasPermission('admins-update')) {
                    $btn = '<a href="'.route('admin.admins.edit', $row->id).'" type="button" class="btn btn-icon btn-primary"><span class="tf-icons mdi mdi-circle-edit-outline mdi-24px"></span></a> &nbsp';
                } else {
                    $btn = '<button  type="button" class="btn btn-icon btn-primary btn-fab demo disabled"><i data-feather="edit"></i></button>';
                }

                if (auth()->guard('admin')->user()->hasPermission('admins-delete')) {
                    $btn = $btn.
                        '<form class="delete"  action="'.route('admin.admins.destroy', $row->id).'"  method="POST" id="delform"
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
            ->rawColumns(['action', 'active']);
    }

    public function query(Admin $model): QueryBuilder
    {
        return $model->query()->withoutSuperAdmin();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();

    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->addClass('text-center')->orderable(false)->searchable(false),
            Column::make('name')->title(__('admin.name'))->addClass('text-center'),
            Column::make('email')->title(__('admin.email'))->addClass('text-center'),
            Column::make('role_id')->title(__('admin.role'))->addClass('text-center'),
            Column::computed('active')->title(__('admin.active'))->exportable(false)->printable(false)->addClass('text-center'),
            Column::computed('action')->title(__('admin.action'))->exportable(false)->printable(false)->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Admin_'.date('YmdHis');
    }
}
