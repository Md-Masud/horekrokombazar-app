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
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ])->category()->associate($request->category_id);
    }
    public  function  getSubCategorytId($id)
    {
        return $this->subCategoryRepository($id);

    }
    public function updateSubCategory($id, $request)
    {
        // TODO: Implement updateSubCategory() method.
        return $this->subCategoryRepository->update($id,[
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ])->category()->associate($request->category_id);
    }

    public function deleteSubCategory($id)
    {
        // TODO: Implement deleteSubCategory() method.
        return $this->subCategoryRepository->destroy($id);
    }
}
