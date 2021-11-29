<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class LogBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'log_books';

    protected $fillables = [
        'requisition_id',
        'shift',
        'reference_no',
        'fabric_type',
        'roll',
        'time',
        'dyeing_procedure',
        'cf_to_wash',
        'cf_to_water',
        'cf_to_perspiration',
        'pilling',
        'bursting',
        'shrinkage_l_w',
        'shrinkage_w_w',
        'shrinkage_sp_percentage',
        'cf_to_rubbing_dry',
        'cf_to_rubbing_wet',
        'r_width',
        't_width',
        'r_gsm',
        'f_gsm',
        'report_to_qc_time',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

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

    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id')->withDefault();
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
