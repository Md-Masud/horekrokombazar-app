<?php


namespace App\Services\BrandServices;


interface InterfaceBrandService
{
    public  function getBrandOfIndex();

    public  function  createBrand($request);

    public function  updateBrand($id,$request);

    public  function  deleteBrand($id);

    public  function  getBrandId($id);
}
