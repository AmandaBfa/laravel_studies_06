<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    // one to one relationship with Phone
    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    // one to many relationship with Phone
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
}
