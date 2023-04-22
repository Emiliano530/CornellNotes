<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Reminder extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(user::class,'id_user');
    }

    public $timestamps = false;

    protected $fillable = ['title', 'content', 'value', 'creation_date', 'event_date', 'id_user'];

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

      protected function value(): Attribute
    {
        return new Attribute(
            get: function($value){
                switch ($value) {
                    case 1:
                        return 'Muy importante';
                    case 2:
                        return 'Importante';
                    case 3:
                        return 'Regular';
                    case 4:
                        return 'No importante';
                    // Agrega más casos para más valores numéricos
                    default:
                        return 'desconocido';
                }
            },

            set: fn($value) => $value
        );
    }

}
