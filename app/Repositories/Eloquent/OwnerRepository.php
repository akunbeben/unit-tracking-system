<?php

namespace App\Repositories\Eloquent;

use App\Models\UnitOwner;
use App\Repositories\Interfaces\IOwnerRepository;

class OwnerRepository extends BaseRepository implements IOwnerRepository
{
  protected $model;

  public function __construct(UnitOwner $model) {
    $this->model = $model;
  }

  public function paginated($perPage, $relations = null, $searchQuery = null)
  {
    if ($relations !== null)
      $this->model = $this->model->with($relations);

    if ($searchQuery !== null)
      $this->model = $this->model->where('name', 'ILIKE ' . $searchQuery);

    return $this->model->orderBy('created_at', 'desc')
      ->paginate($perPage)
      ->appends(['search' => $searchQuery]);
  }
}