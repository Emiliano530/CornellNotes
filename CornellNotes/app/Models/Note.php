<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Note extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(user::class,'id_user');
    }

    public function topics() {
        return $this->belongsTo(topic::class,'id_topic');
    }

    public $timestamps = false;

    protected $fillable = ['title', 'content', 'keyWords', 'summary', 'creation_date', 'id_user', 'id_topic'];

    protected function title(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),

            set: fn($value) => strtolower($value)
        );
    }

    protected function content(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),

            set: fn($value) => strtolower($value)
        );
    }
    protected function keyWords(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),

            set: fn($value) => strtolower($value)
        );
    }

    protected function summary(): Attribute
    {
        return new Attribute(
            get: fn($value) => ucfirst($value),

            set: fn($value) => strtolower($value)
        );
    }

    public function getcreationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->locale('es')->isoFormat('DD/MMM/YYYY') : null;
    }
}
