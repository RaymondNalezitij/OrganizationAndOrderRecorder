<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'contact_email',
    ];

    public function organizationProducts(): HasMany
    {
        return $this->hasMany(OrganizationProduct::class);
    }
}
