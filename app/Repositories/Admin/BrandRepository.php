<?php


namespace App\Repositories\Admin;


use App\Models\Brand;
use App\Repositories\BaseRepository;


class BrandRepository extends  BaseRepository implements InterfaceBrand
{
 public function __construct(Brand $model)
 {
     parent::__construct($model);
 }
}
