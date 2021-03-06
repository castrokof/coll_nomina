<?php

namespace App\Models\Nomina;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    protected $fillable = [
        'position',
        'salary',
        'value_hour',
        'value_hour_add',
        'value_patient_attended',
        'value_hour_night',
        'value_add_security_social'
        ];



        public function positionid()
        {
            return $this->hasMany(Usuario::class, 'cargo_id');
        }
}
