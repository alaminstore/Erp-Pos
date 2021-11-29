<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function buyerr()
    {
        return $this->belongsTo(Buyer::class,'buyer', 'id')->withDefault();
    }
    public function stylee (){
        return $this->belongsTo(Style::class,'style', 'id')->withDefault();
    }
    public function zalopos(){
        return $this->belongsTo(Zalopo::class,'zalopo','id')->withDefault();
    }
    public function season(){
        return $this->belongsTo(Season::class)->withDefault();
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class)->withDefault();
    }
    public function racklistt(){
        return $this->belongsTo(Racklist::class,'racklist','id')->withDefault();
    }

    public function stock(){
        return $this->belongsTo(Stock::class,'pattern_no','id')->withDefault();
    }

    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class,'fabric_comp','id')->withDefault();
    }

    public function colors(){
        return $this->belongsTo(Color::class,'color','id')->withDefault();
    }
    public function uomm(){
        return $this->belongsTo(Uom::class,'uom','id')->withDefault();
    }


}
