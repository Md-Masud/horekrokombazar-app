<?php


namespace App\Repositories\Admin;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements InterfaceCategory
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


}
