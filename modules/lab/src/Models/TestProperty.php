<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestProperty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'details',
    ];

    const TYPES = [
        'COLOR FASTNESS TEST' => 'COLOR FASTNESS TEST',
        'PHYSICAL TEST' => 'PHYSICAL TEST',
        'DIMENSIONAL STABILITY TO WASHING' => 'DIMENSIONAL STABILITY TO WASHING',
        'CHEMICAL TEST' => 'CHEMICAL TEST',
    ];
}
