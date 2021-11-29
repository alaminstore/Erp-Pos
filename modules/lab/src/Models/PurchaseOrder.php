<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'buyer_id',
        'style_id',
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($logBook) {
            $logBook->created_by = auth()->user()->id;
        });
        static::saving(function($logBook) {
            $logBook->created_by = auth()->user()->id;
        });
        static::updating(function($logBook) {
            DB::table($logBook->table)->where('id', $logBook->id)->update([
                'updated_by' => auth()->user()->id,
            ]);
        });
        static::deleting(function($logBook) {
            DB::table($logBook->table)->where('id', $logBook->id)->update([
                'deleted_by' => auth()->user()->id,
            ]);
        });
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id')->withDefault();
    }

    public function style()
    {
        return $this->belongsTo(Style::class, 'style_id')->withDefault();
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault();
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by')->withDefault();
    }

    public function deletedUser()
    {
        return $this->belongsTo(User::class, 'deleted_by')->withDefault();
    }
}
