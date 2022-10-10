<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'price',
    ];

    public function organizationProducts(): HasMany
    {
        return $this->hasMany(OrganizationProduct::class);
    }
}
