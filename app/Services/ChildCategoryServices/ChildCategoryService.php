<?php


namespace App\Services\ChildCategoryServices;

use App\Repositories\Admin\InterfaceChildCategory;
use Illuminate\Support\Str;


class ChildCategoryService implements InterfaceChildCategoryService
{
    private $interfaceChildCategory;

    public function __construct(InterfaceChildCategory $interfaceChildCategory)
    {
        $this->interfaceChildCategory = $interfaceChildCategory;
    }

    public function getChildCategoryOfIndex()
    {

        // TODO: Implement getSubCategoryOfIndex() method.
        return $this->interfaceChildCategory->get();
    }

    public function createChildCategory($request)
    {

        // TODO: Implement createSubCategory() method.
        return $this->interfaceChildCategory->create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ]);
    }

    public function getChildCategoryId($id)
    {
         return $this->interfaceChildCategory->find($id);

    }

    public function updateChildCategory($id, $request)
    {
        // TODO: Implement updateSubCategory() method.
        return $this->interfaceChildCategory->update($id, [
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    public function deleteChildCategory($id)
    {
        // TODO: Implement deleteSubCategory() method.
        return $this->interfaceChildCategory->destroy($id);
    }
}
