<?php


namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricbooking extends Model
{
    use HasFactory;

    protected $table = 'fabric-bookings';

    protected $guarded=[];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class)->withDefault();
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class)->withDefault();
    }
    public function season(){
        return $this->belongsTo(Season::class)->withDefault();
    }
    public function zalopo(){
        return $this->belongsTo(Zalopo::class)->withDefault();
    }
    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }

    public function style(){
        return $this->belongsTo(Style::class)->withDefault();
    }
    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
    public function fabricbooking_details(){
        return $this->hasMany(FabricBook::class,'fabric_booking_id');
    }

}
