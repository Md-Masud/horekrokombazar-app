<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class BaseRepository implements InterfaceRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * @param $attributes
     * @return Model
     */
    public function create($attributes): Model
    {
        return $this->model->create($attributes);
    }
    /**
     * @param $id
     * @param $attributes
     * @return Model
     */
    public function update($id, $attributes)
    {
        return $this->model->where(['id' => $id])->update($attributes);
    }
    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        return $this->model->destroy($id);
    }
    /**
     * @param $id
     * @return Model
     */
    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }
    /**
     * @param mixed ...$where
     * @return Builder
     */
    public function where(...$where): Builder
    {
        return $this->model->where(...$where);
    }
    /**
     * @param mixed ...$with
     * @return Builder
     */
    public function with(...$with): Builder
    {
        return $this->model->with(...$with);
    }
    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }


    /**
     * @return bool
     */
    public function save():bool
    {
        return $this->model->save();
    }

    /**
     * @return Collection
     */

    public function all():Collection
    {
        return $this->model->all();
    }
}
