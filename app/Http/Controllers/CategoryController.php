<?php

namespace App\Http\Controllers;

use App\Http\Services\Backend\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ){}

    public function index()
    {
        return view('backend.categories.index');
    }

    public function serverside(Request $request)
    {
        return $this->categoryService->dataTable($request);
    }

    public function show($uuid)
    {
        return $uuid;
    }
}
