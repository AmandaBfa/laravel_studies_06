<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    // one to one relationship
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    // one to many relationship
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    // many to many relationship
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders', 'client_id', 'product_id');
    }
}
