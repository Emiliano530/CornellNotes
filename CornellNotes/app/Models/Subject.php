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

    public function topics() {
        return $this->hasMany(topic::class,'id_topic');
    }
    
    public $timestamps = false;

    protected $fillable = ['subject', 'id_career'];
}
