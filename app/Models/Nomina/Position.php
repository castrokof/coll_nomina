<?php

namespace App\Models\Nomina;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'liquidationxuser';

    protected $fillable = [
        'position',
        'salary',
        'value_hour',
        'value_hour_add',
        'value_patient_attended'
        ];

      

        public function positionid()
        {
            return $this->hasMany(Usuario::class, 'cargo_id');
        }
}
