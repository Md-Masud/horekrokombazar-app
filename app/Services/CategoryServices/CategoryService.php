<?php


namespace App\Services\CategoryServices;


use App\Repositories\Admin\InterfaceCategory;
use Illuminate\Support\Str;

class CategoryService implements InterfaceCategoryService
{
    private $interfaceCategory;

    public function __construct(InterfaceCategory $interfaceCategory)
    {
        $this->interfaceCategory = $interfaceCategory;
    }

    public function getCategoryOfIndex()
    {

        return $categories = $this->interfaceCategory->get();
    }

    public function createCategory($request)
    {
        // TODO: Implement createCategory() method.
        return $categories = $this->interfaceCategory->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);


    }
    public  function  getCategorytId($id)
    {
        return $this->interfaceCategory->find($id);

    }

    public function updateCategory($id, $request)
    {
        $category = $this->interfaceCategory->update($id, [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return $category;
    }

    public function deleteCategory($id)
    {

        // TODO: Implement deleteCategory() method.
        return $category = $this->interfaceCategory->destroy($id);
    }
}
