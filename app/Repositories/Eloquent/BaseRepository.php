<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function getAll($relations = null)
  {
    if ($relations !== null)
      $this->model = $this->model->with($relations);

    return $this->model->get();
  }

  public function getById($id, $relations = null)
  {
    if ($relations !== null)
      $this->model = $this->model->with($relations);

    return $this->model->find($id);
  }

  public function create($attributes)
  {
    return $this->model->create($attributes);
  }

  public function update($id, $attributes)
  {
    $this->model = $this->getById($id);
    
    return $this->model->update($attributes);
  }

  public function delete($id)
  {
    $this->getById($id)->delete();
  }
}