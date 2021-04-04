<?php

namespace App\Repositories\Interfaces;

interface IBaseRepository
{
  public function getAll($relations = null);
  public function getById($id, $relations = null);
  public function create($attributes);
  public function update($id, $attributes);
  public function delete($id);
}