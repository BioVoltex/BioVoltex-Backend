<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fertilizer extends Model
{
    use HasFactory;

    protected $table = 'fertilizers';
    protected $guarded = [];


    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
