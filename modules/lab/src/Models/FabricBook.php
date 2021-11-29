<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricBook extends Model
{
    use HasFactory;

    protected $table = 'fabric-booking-details';

    protected $guarded=[];

    public function buyer(){
        return $this->belongsTo(Buyer::class)->withDefault();
    }
    public function style(){
        return $this->belongsTo(Style::class)->withDefault();
    }
    public function zalopo(){
        return $this->belongsTo(Zalopo::class)->withDefault();
    }
    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }
    public function Fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
}
