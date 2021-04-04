<?php

namespace App\Repositories\Interfaces;

interface IOwnerRepository
{
  public function paginated($perPage, $relations = null, $searchQuery = null);
}