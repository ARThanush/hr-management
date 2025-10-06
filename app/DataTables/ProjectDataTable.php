<?php

namespace App\DataTables;

use Modules\Project\Models\Project;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
{
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('project', function (Project $row) {
                return '<a href="'.route('projects.show', ['project' => \Crypt::encrypt($row->id)]).'">'.e($row->name).'</a>';
            })
            ->addColumn('client', function (Project $row) {
                return optional($row->client)->fullname ?? '-';
            })
            ->editColumn('startDate', function (Project $row) {
                return $row->startDate ? format_date($row->startDate) : '-';
            })
            ->editColumn('endDate', function (Project $row) {
                return $row->endDate ? format_date($row->endDate) : '-';
            })
            ->addColumn('action', function (Project $row) {
                $id = $row->id;
                return view('project::actions', compact('id'));
            })
            ->rawColumns(['project','action']);
    }

    public function query()
    {
        return Project::query();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('projects-list-table')
            ->columns($this->getColumns())
            ->parameters([
                'dom' => 'Bftip',
            ])
            ->minifiedAjax()
            ->orderBy(1)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                // Button::make('pdf'), // requires wkhtmltopdf
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('project')->title(__('Project')),
            Column::make('client')->title(__('Client')),
            Column::make('startDate')->title(__('Start Date')),
            Column::make('endDate')->title(__('End Date')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-end'),
        ];
    }

    protected function filename(): string
    {
        return 'Projects_' . date('YmdHis');
    }
}


