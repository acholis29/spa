<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsCatalogImages extends Model
{
    protected $fillable = [
    'ms_catalog_id',
    'description',
    'is_active',
    'catalog_images'
    ];
}
