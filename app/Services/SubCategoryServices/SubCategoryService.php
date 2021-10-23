<?php


namespace App\Services\SubCategoryServices;


use App\Repositories\Admin\InterfaceSubCategoryRepository;
use Illuminate\Support\Str;


class SubCategoryService implements InterfaceSubCategoryService
{
    private $subCategoryRepository;
   public  function __construct(InterfaceSubCategoryRepository $subCategoryRepository){
       $this->subCategoryRepository=$subCategoryRepository;
   }
    public function getSubCategoryOfIndex()
    {
        return $this->subCategoryRepository->get();
        // TODO: Implement getSubCategoryOfIndex() method.
    }

    public function createSubCategory($request)
    {
        // TODO: Implement createSubCategory() method.
        return $this->subCategoryRepository->create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);

    }
    public  function  getSubCategorytId($id)
    {
        return $this->subCategoryRepository->find($id);

    }
    public  function  getSubCategoryt($id)
    {
        return $this->subCategoryRepository->where('category_id',$id)->get();

    }

    public function updateSubCategory($id, $request)
    {
        // TODO: Implement updateSubCategory() method.

        return $this->subCategoryRepository->update($id,[
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
    }

    public function deleteSubCategory($id)
    {
        // TODO: Implement deleteSubCategory() method.
        return $this->subCategoryRepository->destroy($id);
    }
}
