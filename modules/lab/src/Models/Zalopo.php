<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zalopo extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'name', 'id')->withDefault();
    }
    public function styles(){
        return $this->belongsTo(Style::class, 'style', 'id')->withDefault();
    }
}
