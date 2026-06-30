<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentCategory;
use App\Models\DepartmentPage;

class DepartmentController extends Controller
{
    public function index()
    {
        $departmentPage = DepartmentPage::where('status', 1)->first();

        $departmentCategories = DepartmentCategory::where('status', 1)
            ->with(['departments' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.department', compact(
            'departmentPage',
            'departmentCategories'
        ));
    }

    public function show(Department $department)
    {
        abort_if(!$department->status, 404);

        $department->load([
            'category',
            'faculties' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            },
            'resources' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order')
                    ->orderBy('id');
            },
            'notices' => function ($query) {
                $query->where('status', 1)
                    ->orderByDesc('notice_date')
                    ->orderBy('sort_order')
                    ->orderByDesc('id');
            },
        ]);

        return view('frontend.department-detail', compact('department'));
    }
}