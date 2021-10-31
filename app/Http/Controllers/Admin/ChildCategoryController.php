<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChildCategoryRequest;
use App\Services\CategoryServices\InterfaceCategoryService;
use App\Services\ChildCategoryServices\InterfaceChildCategoryService;
use App\Services\SubCategoryServices\InterfaceSubCategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChildCategoryController extends Controller
{
    private $interfaceCategoryService, $interfaceSubCategoryService, $interfaceChildCategoryService;

    public function __construct(InterfaceCategoryService $interfaceCategoryService, InterfaceSubCategoryService $interfaceSubCategoryService, InterfaceChildCategoryService $interfaceChildCategoryService)
    {
        $this->interfaceCategoryService = $interfaceCategoryService;
        $this->interfaceSubCategoryService = $interfaceSubCategoryService;
        $this->interfaceChildCategoryService = $interfaceChildCategoryService;

    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = $this->interfaceChildCategoryService->getChildCategoryOfIndex();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('sub_category_name', function ($data) {
                    return $data->subcategory->name;
                })
                ->addColumn('action', function ($row) {

                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#childeditModal"><i class="fas fa-edit"></i></a>

                      	</a>
                      	<button class="btn btn-danger waves-effect" type="button"
                                                        onclick="deleteId(' . $row->id . ')">
                                                    <i class="material-icons">delete</i>
                                                </button>

                           <form id="delete-form-' . $row->id . '" action="' . route('admin.childcategory.destroy', [$row->id]) . '" method="POST" style="display: none;">

                       ' . csrf_field() . '
                       ' . method_field("DELETE") . '
                    </form>
                                               ';

                    return $actionbtn;

                })
                ->rawColumns(['action', 'category_name', 'sub_category_name'])
                ->make(true);
        }

        $categories = $this->interfaceCategoryService->getCategoryOfIndex();
        $subcategories = $this->interfaceSubCategoryService->getSubCategoryOfIndex();

        return view('admin.category.childcategory.index', compact('categories', 'subcategories'));
    }

    public function cat()
    {
        $category_id = request('category');
       $subcategory = $this->interfaceSubCategoryService->getSubCategoryt($category_id);
        $option = "<option value=''>Select SubCategory</option>";
        foreach ($subcategory as $sub) {
            $option .= '<option value="' . $sub->id . '">' . $sub->name . '</option>';
        }

        return $option;
    }

    public function store(ChildCategoryRequest $request)
    {

        if ($this->interfaceChildCategoryService->createChildCategory($request)) {
            $notification = array('messege' => 'ChildCategory Save Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'ChildCategory not Save !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);

        }
    }

    public function edit($id)
    {

        $data = $this->interfaceChildCategoryService->getChildCategoryId($id);
        $categories = $this->interfaceCategoryService->getCategoryOfIndex();
        $subcategories =$this->interfaceSubCategoryService->getSubCategoryOfIndex();

        return view('admin.category.childcategory.form', compact('categories', 'subcategories', 'data',));

    }

    public function update(ChildCategoryRequest $categoryRequest, $id)
    {
        if ($this->interfaceChildCategoryService->updateChildCategory($id, $categoryRequest)) {
            $notification = array('messege' => 'ChildCategory Update Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'ChildCategory not Update !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {

        if ($this->interfaceChildCategoryService->deleteChildCategory($id)) {
            $notification = array('messege' => 'Category delete Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('messege' => 'Category not delete !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

}
