<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Style extends Model
{
    protected $guarded=[];
    use HasFactory;

   public function buyer(){
        return $this->belongsTo(Buyer::class, 'name', 'id')->withDefault();
    }
}
