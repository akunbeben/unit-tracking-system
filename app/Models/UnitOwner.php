<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOwner extends Model
{
    use HasFactory;

    protected $table = 'unit_owners';

    public function units()
    {
        $this->hasMany(Unit::class, 'owner_id', 'id');
    }
}
