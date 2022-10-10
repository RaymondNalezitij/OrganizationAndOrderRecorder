<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationProduct extends Model
{
    protected $fillable = [
        'organization_id',
        'product_id',
        'quantity',
        'date_provided',
    ];

    public function organizations(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
