<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FabricTestWorkSheet extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fabric_test_work_sheets';

    protected $fillable = [
        'requisition_id',
        'report_no',
        'roll',
        'type',
        'color_fastness_to_rubbing',
        'fabric_weight',
        'bursting_strength',
        'pilling_resistance',
        'abrasion_resistance',
        'pull_test',
        'stitch_recovery',
        'color_fastness_to_washing',
        'color_fastness_to_water',
        'color_fastness_to_perspiration',
        'color_fastness_to_saliva',
        'phenolic_yellowing',
        'color_fastness_to_light',
        'ph_value',
        'dimensional_stability_to_washing',
        'twisting',
        'appearance_after_wash',
        'print_durability',
        'cross_staining',
        'best_in_class',
        'fiber_composition',
        'nickel_test',
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
        'color_fastness_to_rubbing' => Json::class,
        'fabric_weight' => Json::class,
        'bursting_strength' => Json::class,
        'pilling_resistance' => Json::class,
        'abrasion_resistance' => Json::class,
        'pull_test' => Json::class,
        'stitch_recovery' => Json::class,
        'color_fastness_to_washing' => Json::class,
        'color_fastness_to_water' => Json::class,
        'color_fastness_to_perspiration' => Json::class,
        'color_fastness_to_saliva' => Json::class,
        'phenolic_yellowing' => Json::class,
        'color_fastness_to_light' => Json::class,
        'ph_value' => Json::class,
        'dimensional_stability_to_washing' => Json::class,
        'twisting' => Json::class,
        'appearance_after_wash' => Json::class,
        'print_durability' => Json::class,
        'cross_staining' => Json::class,
        'best_in_class' => Json::class,
        'fiber_composition' => Json::class,
        'nickel_test' => Json::class
    ];

    CONST TEST_PROPERTIES = [
        'all' => 'All',
        'conditioning_area' => 'Conditioning Area',
        'physical_area' => 'Physical Area',
        'others' => 'Others',
        'yarn' => 'Yarn',
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

    public function yarnTestWorkSheet()
    {
        return $this->hasOne(YarnTestWorkSheet::class, 'requisition_id', 'requisition_id');
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
