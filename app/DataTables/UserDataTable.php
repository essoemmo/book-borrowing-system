<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                if (auth()->guard('admin')->user()->hasPermission('users-update')) {
                    $btn = '<a href="'.route('admin.users.edit', $row->id).'" type="button" class="btn btn-icon btn-primary"><span class="tf-icons mdi mdi-circle-edit-outline mdi-24px"></span></a> &nbsp';
                } else {
                    $btn = '<button  type="button" class="btn btn-icon btn-primary btn-fab demo disabled"><i data-feather="edit"></i></button>';
                }

                if (auth()->guard('admin')->user()->hasPermission('users-delete') == null) {
                    $btn = $btn.
                        '<form class="delete"  action="'.route('admin.users.destroy', $row->id).'"  method="POST" id="delform"
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
            ->editColumn('active', function ($query) {
                $checked = '';
                if ($query->is_active) {
                    $checked = 'checked';
                }

                return '
              <label class="switch switch-square switch-lg">
                <input type="checkbox" class="switch-input" data-id="'.$query->id.'" data-url = "'.route(
                        'admin.user.active',
                        $query->id
                    ).'" id="check" data-massage = "'.__('admin.statuschange').'" '.$checked.'/>
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
            ';
            })
            ->rawColumns(['action', 'active']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->query()->orderByDesc('id');
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
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make([
                    'extend' => 'pdfHtml5',
                    'text' => 'Export PDF', // Custom button text
                    'title' => 'Custom PDF Title',
                    'className' => 'dt-button btn btn-primary text-nowrap',
                    'customize' => 'function (doc) {
                    // Modify the title style
                    doc.styles.title = {
                        color: "red",
                        fontSize: "20",
                        alignment: "center"
                    };

                    // Add custom content to the header
                    doc.content.splice(0, 0, {
                        text: "Custom Header for PDF Export",
                        style: "header"
                    });

                    // Adjust table header style
                    doc.styles.tableHeader = {
                        bold: true,
                        color: "blue",
                        alignment: "center"
                    };
                }'
                ]),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->addClass('text-center')->orderable(false)->searchable(false),
            Column::make('name')->title(__('admin.name'))->addClass('text-center'),
            Column::make('phone')->title(__('admin.phone'))->addClass('text-center'),
            Column::make('email')->title(__('admin.email'))->addClass('text-center'),
            Column::computed('active')->title(__('admin.active'))->exportable(false)->printable(false)->addClass('text-center'),
            Column::computed('action')->title(__('admin.action'))->exportable(false)->printable(false)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_'.date('YmdHis');
    }
}
