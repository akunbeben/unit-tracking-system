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
}