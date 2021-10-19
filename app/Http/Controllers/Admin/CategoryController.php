<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\CategoryServices\InterfaceCategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(InterfaceCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategoryOfIndex();
        return view('admin.category.category.index', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        if ($this->categoryService->createCategory($request)) {
            $notification = array('messege' => 'Category delete Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'Your Password Changed!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);

        }
    }

    public function show($id)
    {

        if ($this->categoryService->deleteCategory($id)) {
            $notification = array('messege' => 'Category delete Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'Your Password Changed!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {

        $data = $this->categoryService->getCategorytId($id);
        return view('admin.category.category.edit', compact('data'));

    }

    public function update(CategoryRequest $categoryRequest, $id)
    {

        if ($this->categoryService->updateCategory($id, $categoryRequest)) {
            $notification = array('messege' => 'Category delete Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'Your Password Changed!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


}
