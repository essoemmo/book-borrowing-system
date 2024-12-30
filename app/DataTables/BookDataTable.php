<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery();
    }

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
            Column::make('title')->title(__('admin.title'))->addClass('text-center'),
            Column::make('author')->title(__('admin.author'))->addClass('text-center'),
            Column::make('isbn')->title(__('admin.isbn'))->addClass('text-center'),
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
