<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnaerobicDigester extends Model
{
    use HasFactory;

    protected $table = 'anaerobic_digesters';
    protected $guarded = [];




    // Each anaerobic digesters has only one user
    public function users()
    {
        return  $this->belongsTo(User::class);
    }
}
