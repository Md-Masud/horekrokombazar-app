<?php


namespace App\Repositories\Admin;


use App\Models\SubCategory;
use App\Repositories\BaseRepository;

class SubCategoryRepository extends BaseRepository implements InterfaceSubCategoryRepository
{
 public function __construct(SubCategory $model)
 {
     parent::__construct($model);
 }
}
