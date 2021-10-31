<?php


namespace App\Repositories\Admin;

use App\Models\Seo;
use App\Repositories\BaseRepository;

class SeoRepository extends BaseRepository implements InterfaceSeo
{
 public function __construct(Seo $model)
 {
     parent::__construct($model);
 }
    public function first()
    {
        return $this->model->first();
    }
}
