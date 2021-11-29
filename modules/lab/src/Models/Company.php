<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'responsible_person',
        'phone_no'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }
}
