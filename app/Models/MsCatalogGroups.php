<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MsCatalogGroups extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
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
}
