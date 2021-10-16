<?php


namespace App\Services\CategoryServices;


interface InterfaceCategoryService
{
    public  function getCategoryOfIndex();

    public  function  createCategory($request);

    public function  updateCategory($id,$request);

    public  function  deleteCategory($id);


}
