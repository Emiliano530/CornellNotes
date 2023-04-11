<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(user::class,'id_career');
    }

    public function subjects() {
        return $this->hasMany(subject::class,'id_career');
    }
}
