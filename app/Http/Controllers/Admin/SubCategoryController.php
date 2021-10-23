<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Services\CategoryServices\InterfaceCategoryService;
use App\Services\SubCategoryServices\InterfaceSubCategoryService;

class SubCategoryController extends Controller
{
    private $subCategoryService;
    private $categoryService;
    public function __construct(InterfaceSubCategoryService $subCategoryService,InterfaceCategoryService $categoryService)
    {
        $this->subCategoryService=$subCategoryService;
        $this->categoryService=$categoryService;
    }

    public function index()
    {
        $categories=$this->categoryService->getCategoryOfIndex();

        $subcategories=$this->subCategoryService->getSubCategoryOfIndex();
        return view('admin.category.subcategory.index', compact('subcategories','categories'));
    }



    public function store(SubCategoryRequest $request)
    {

        if($this->subCategoryService->createSubCategory($request))
        {
            $notification = array('messege' => 'SubCategory Save Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('messege' => 'SubCategory  not Save !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    public function edit($id)
    {
        $categories=$this->categoryService->getCategoryOfIndex();
        $data=$this->subCategoryService->getSubCategorytId($id);
        return view('admin.category.subcategory.form',compact('categories','data'));
    }


    public function update(SubCategoryRequest $request, $id)
    {

        if($this->subCategoryService->updateSubCategory($id,$request))
        {
            $notification = array('messege' => 'SubCategory Update Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('messege' => 'SubCategory  not Update !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        if ($this->subCategoryService->deleteSubCategory($id)) {
            $notification = array('messege' => 'SunCategory delete Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'SubCategory not delete !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
