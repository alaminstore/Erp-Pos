<?php


namespace SkylarkSoft\GoRMG\Lab\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockindetail extends Model
{
    use HasFactory;

    protected $table = 'stockin_details';

    protected $guarded=[];

    public function fabriccomposition(){
        return $this->belongsTo(Fabriccomposition::class)->withDefault();
    }
    public function color(){
        return $this->belongsTo(Color::class)->withDefault();
    }
}
