<?php

namespace Extra\YouTube\DataGrids;

use Webkul\DataGrid\DataGrid;
use Illuminate\Support\Facades\DB;

class YouTubeDataGrid extends DataGrid
{
    protected $index = 'id';
    protected $sortOrder = 'desc';

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('youtube')
            ->addSelect('id', 'name', 'url', 'created_at');

        $this->addFilter('id', 'youtube.id');
        $this->addFilter('name', 'youtube.name');

        return $queryBuilder;
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('youtube::app.youtube.index.datagrid.id'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('youtube::app.youtube.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'url',
            'label'      => trans('youtube::app.youtube.index.datagrid.url'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('youtube::app.youtube.index.datagrid.created-at'),
            'type'       => 'date_range',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

    }

    public function prepareActions()
    {

        if (bouncer()->hasPermission('youtube.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('youtube::app.youtube.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.youtube.delete', $row->id);
                },
            ]);
        }
    }
}
