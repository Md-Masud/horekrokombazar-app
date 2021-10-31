<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Services\BrandServices\InterfaceBrandService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    private $interfaceBrandService;
    public function __construct(InterfaceBrandService $interfaceBrandService)
    {
        $this->interfaceBrandService=$interfaceBrandService;
    }
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = $this->interfaceBrandService->getBrandOfIndex();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('brand_logo', function($data){
                    if ($data->brand_logo == NULL){
                        return 'No Image';
                    }
                    return '<img class="rounded-square" text-align="center" width="100" height="50" src=" '.asset('public/files/brand/'.$data->brand_logo).' " alt="" >';
                })
                ->editColumn('front_page',function($row){
                    if ($row->front_page==1) {
                        return '<span class="badge badge-success">Home Page</span>';
                    }
                })
                ->addColumn('action', function ($row) {

                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#ditModal"><i class="fas fa-edit"></i></a>

                      	</a>
                      	<button class="btn btn-danger waves-effect" type="button"
                                                        onclick="deleteId(' . $row->id . ')">
                                                    <i class="material-icons">delete</i>
                                                </button>

                           <form id="delete-form-' . $row->id . '" action="' . route('admin.brand.destroy', [$row->id]) . '" method="POST" style="display: none;">

                       ' . csrf_field() . '
                       ' . method_field("DELETE") . '
                    </form>
                                               ';

                    return $actionbtn;

                })
                ->rawColumns(['action','brand_logo'])
                ->make(true);
        }



        return view('admin.category.brand.index');
    }
    public  function  store(BrandRequest $request)
    {
        if($this->interfaceBrandService->createBrand($request)){
            $notification = array('messege' => 'Brand Save Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('messege' => 'Brand not Save !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
    public  function  edit($id)
    {
        $data=$this->interfaceBrandService->getBrandId($id);

        return view('admin.category.brand.form',compact('data'));
    }
    public  function  update($id,BrandRequest $request)
    {

        if($this->interfaceBrandService->updateBrand( $id,$request)){
            $notification = array('messege' => 'Brand Update Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('messege' => 'Brand not Update !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
    public  function destroy($id)
    {
        if($this->interfaceBrandService->deleteBrand($id)){
            $notification = array('messege' => 'Brand Brand Successful!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('messege' => 'Brand not Delete !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
