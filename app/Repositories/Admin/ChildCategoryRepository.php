<?php


namespace App\Repositories\Admin;


use App\Models\ChildCategory;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ChildCategoryRepository extends BaseRepository implements InterfaceChildCategory
{
    public function __construct(ChildCategory $model)
    {
        parent::__construct($model);
    }
}
