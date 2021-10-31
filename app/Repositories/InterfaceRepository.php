<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface InterfaceRepository
{

    public function create($attributes): Model;

    public function update($id, $attributes);

    public function destroy($id): bool;

    public function find($id): Model;

    public function where(...$where): Builder;

    public function with(...$with): Builder;

    public function get();


    public function save(): bool;

    public function all():Collection;



}
