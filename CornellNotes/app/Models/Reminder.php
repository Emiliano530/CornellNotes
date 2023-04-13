<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(user::class,'id_user');
    }

    public function topics() {
        return $this->belongsTo(topic::class,'id_topic');
    }

    public $timestamps = false;

    protected $fillable = ['title', 'content', 'value', 'creation_date', 'event_date', 'id_user', 'id_topic'];
}
