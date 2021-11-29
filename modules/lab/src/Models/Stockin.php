<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    use HasFactory;

    protected $table = 'stockin';

    protected $guarded=[];


    public function racklist(){
        return $this->belongsTo(Racklist::class)->withDefault();
    }
    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }
    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
}
