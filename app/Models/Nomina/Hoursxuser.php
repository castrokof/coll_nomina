<?php

namespace App\Models\Nomina;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoursxuser extends Model
{
    protected $table = 'hoursxuser';

    protected $fillable = [
        'date_turn',
        'hours_initial_turn',
        'hours_end_turn',
        'working_type',
        'hours',
        'observation',
        'user_id'
        ];


        public function userid()
        {
            return $this->belongsTo(Usuario::class, 'id');
        }
}
