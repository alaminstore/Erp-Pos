<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class YarnTestWorkSheet extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'yarn_test_work_sheets';

    protected $fillable = [
        'requisition_id',
        'submitted_by',
        'lot_no',
        'brand',
        'count',
        'lab_no',
        'date_in',
        'date_out',
        'yarn_test_results',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'yarn_test_results' => Json::class,
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

    public function fabricTestWorkSheet()
    {
        return $this->hasOne(FabricTestWorkSheet::class, 'requisition_id', 'requisition_id');
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
