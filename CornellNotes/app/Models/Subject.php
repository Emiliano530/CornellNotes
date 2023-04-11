<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function careers() {
        return $this->belongsTo(Career::class,'id_career');
    }

    public function notes() {
        return $this->hasMany(note::class,'id_subject');
    }
    
    public function reminders() {
        return $this->hasMany(reminder::class,'id_subject');
    }
}
