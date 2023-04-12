<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasFactory;

    public function careers() {
        return $this->belongsTo(Career::class,'id_career');
    }

    public function notes() {
        return $this->hasMany(note::class,'id_user');
    }

    public function reminders() {
        return $this->hasMany(reminder::class,'id_usuario');
    }

    public $timestamps = false;

    protected $fillable = [
        'name',
        'lastName',
        'controlNumber',
        'email',
        'password'
    ];
}

//class User extends Model
//{
    
//}

