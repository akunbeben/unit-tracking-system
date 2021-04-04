<?php

namespace App\Repositories\Interfaces;

interface IUnitRepository
{
  public function paginated($perPage, $relations = null, $searchQuery = null);
}