<?php


namespace App\Services\ChildCategoryServices;


interface InterfaceChildCategoryService
{
    public function getChildCategoryOfIndex();

    public function createChildCategory($request);

    public function updateChildCategory($id, $request);

    public function deleteChildCategory($id);

    public function getChildCategoryId($id);

}
