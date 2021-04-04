<?php

namespace App\Repositories\Eloquent;

use App\Models\Unit;
use App\Repositories\Interfaces\IUnitRepository;

class UnitRepository extends BaseRepository implements IUnitRepository
{
  protected $model;

  public function __construct(Unit $model)
  {
    $this->model = $model;
  }

  public function paginated($perPage, $relations = null, $searchQuery = null)
  {
    if ($relations !== null)
      $this->model = $this->model->with($relations);

    if ($searchQuery !== null)
      $this->model = $this->model->where('unit_identity', 'ILIKE ' . $searchQuery)
        ->orWhere('unit_name', 'ILIKE ' . $searchQuery)
        ->orWhere('unit_description', 'ILIKE ' . $searchQuery);

    return $this->model->orderBy('created_at', 'desc')
      ->paginate($perPage)
      ->appends(['search' => $searchQuery]);
  }
}