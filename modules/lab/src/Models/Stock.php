<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class)->withDefault();
    }
    public function style(){
        return $this->belongsTo(Style::class)->withDefault();
    }
    public function zalopo(){
        return $this->belongsTo(Zalopo::class)->withDefault();
    }
    public function season(){
        return $this->belongsTo(Season::class)->withDefault();
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class)->withDefault();
    }
    public function racklist(){
        return $this->belongsTo(Racklist::class)->withDefault();
    }

    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }
    public function uom(){
        return $this->belongsTo(Uom::class)->withDefault();
    }

}
