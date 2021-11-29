<?php

namespace SkylarkSoft\GoRMG\Lab\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Requisition extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'requisitions';

    protected $fillable = [
        'receive_no',
        'color',
        'size',
        'gsm',
        'fabric',
        'pre_report',
        'other_info',
        'buyer_id',
        'booking_no',
        'batch_no',
        'qty',
        'style_no',
        'po_no',
        'service_type',
        'company_name',
        'mobile_no',
        'email',
        'contact_person',
        'test_method',
        'care',
        'care_instruction',
        'color_fastness',
        'dimentional_stability',
        'physical_test',
        'yarn',
        'chemical_test',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'test_method' => 'array',
        'color_fastness' => 'array',
        'care_instruction' => 'array',
        'dimentional_stability' => 'array',
        'physical_test' => 'array',
        'chemical_test' => 'array',
        'yarn' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->created_by = auth()->user()->id;
        });
        static::saving(function($model) {
            $model->created_by = auth()->user()->id;
        });
        static::updating(function($model) {
            DB::table($model->table)->where('id', $model->id)->update([
                'updated_by' => auth()->user()->id,
            ]);
        });
        static::deleting(function($model) {
            DB::table($model->table)->where('id', $model->id)->update([
                'deleted_by' => auth()->user()->id,
            ]);
        });
    }

    public function setTestMethodAttribute($value)
    {
        $this->attributes['test_method'] = json_encode($value);
    }

    public function setColorFastnessAttribute($value)
    {
        $this->attributes['color_fastness'] = json_encode($value);
    }

    public function setColorCareInstructionAttribute($value)
    {
        $this->attributes['care_instruction'] = json_encode($value);
    }

    public function setDimentionalAttribute($value)
    {
        $this->attributes['dimentional_stability'] = json_encode($value);
    }

    public function setPhysicalTestAttribute($value)
    {
        $this->attributes['physical_test'] = json_encode($value);
    }

    public function setChemicalAttribute($value)
    {
        $this->attributes['chemical_test'] = json_encode($value);
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_name')->withDefault();
    }

    public function logBooks()
    {
        return $this->hasMany(LogBook::class, 'requisition_id');
    }

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
