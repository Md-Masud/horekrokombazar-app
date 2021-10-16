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

        return $categories = $this->interfaceCategory->all();
    }

    public function createCategory($request)
    {
        // TODO: Implement createCategory() method.
        return $categories = $this->interfaceCategory->create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);


    }


    public function updateCategory($id, $request)
    {
        return $category = $this->interfaceCategory->update($id, [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);
    }

    public function deleteCategory($id)
    {
        // TODO: Implement deleteCategory() method.
        return $category = $this->interfaceCategory->destroy($id);
    }
}
