<?php


namespace App\Services\SubCategoryServices;


interface InterfaceSubCategoryService
{
    public  function getSubCategoryOfIndex();

    public  function  createSubCategory($request);

    public function  updateSubCategory($id,$request);

    public  function  deleteSubCategory($id);
    public  function  getSubCategoryt($id);


}
