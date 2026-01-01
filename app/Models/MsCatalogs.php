<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MsCatalogs extends Model
{
    use SoftDeletes;
    protected $fillable = [


        'mscatalog_categorys_id',
        'mscatalog_groups_id',
        'name',
        'sku',
        'description',
        'duration',
        'minstock',
        'maxstock',
        'stock',
        'mscurrencies_id',
        'price',
        'is_priority',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected static function boot()
    {
        $user = Auth::user();

        parent::boot();

        static::creating(function ($model) {
            $model->created_by = $user->id ?? 1;
            $model->updated_by = $user->id ?? 1;
        });

        static::updating(function ($model) {
            $model->updated_by = $user->id ?? 1;
        });
        static::deleting(function ($model) {
            $model->deleted_by = $user->id ?? 1;
            $model->save();
        });
    }


    public function mscatalogGroups()
    {
        return $this->belongsTo(MsCatalogGroups::class);
    }
    public function mscatalogCategorys()
    {
        return $this->belongsTo(MsCatalogCategorys::class);
    }
    public function mscurrencies()
    {
        return $this->belongsTo(MsCurrencies::class);
    }
    public function CatalogImages()
    {
        return $this->hasMany(MsCatalogImages::class, 'ms_catalog_id', 'id');
    }
    
}
