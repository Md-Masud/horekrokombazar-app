<?php


namespace App\Services\SeoServices;


interface InterfaceSeoService
{
    public  function getSubCategoryOfIndex();

    public function getSeoId($id);

    public function updateSeo($id, $request);

}
