<?php

namespace App\Http\Services\Backend;

use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    public function dataTable($request)
    {
        $totalData = Category::count();
        $totalFiltered = $totalData;

        $length = request('length');
        $start = request('start');

        $data = Category::latest()
            ->limit($length)
            ->offset($start)
            ->get(['uuid', 'name', 'slug']);

        return DataTables::of($data)
            ->addIndexColumn()
            ->setOffset($start)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.categories.show', $row->uuid) . '" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
            })
            ->with([
                'recordsTotal' => $totalData,
                'recordsFiltered' => $totalFiltered,
                'start' => $start,
            ])
            ->make(true);
    }
}