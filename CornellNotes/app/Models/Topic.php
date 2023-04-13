<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function topic(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),

            set: fn($value) => strtolower($value)
        );
    }
}
