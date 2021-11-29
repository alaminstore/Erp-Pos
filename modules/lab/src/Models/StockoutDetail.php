<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockoutDetail extends Model
{
    use HasFactory;
    protected $table = 'stockout_details';
    protected $guarded = [];

    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }
    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
    public function getGsm(){
        return $this->belongsTo(Stockindetail::class,'gsm','id')->withDefault();
    }
    public function getDia(){
        return $this->belongsTo(Stockindetail::class,'dia','id')->withDefault();
    }

}
