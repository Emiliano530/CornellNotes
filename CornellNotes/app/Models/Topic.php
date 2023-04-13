<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function subjects() {
        return $this->belongsTo(Subject::class,'id_subject');
    }

    public function notes() {
        return $this->hasMany(note::class,'id_topic');
    }
    
    public function reminders() {
        return $this->hasMany(reminder::class,'id_topic');
    }

    public $timestamps = false;

    protected $fillable = ['topic', 'id_subject'];
}
