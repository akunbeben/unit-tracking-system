<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unit_identity',
        'unit_name',
        'unit_description',
        'owner_id',
    ];

    public function owner()
    {
        return $this->hasOne(UnitOwner::class, 'id', 'owner_id');
    }
}
