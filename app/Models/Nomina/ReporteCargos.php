<?php

namespace App\Models\Nomina;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoursxuser extends Model
{
    protected $table = 'position';

    protected $fillable = [
        'position',
        'salary',
        'value_hour',
        'value_hour_add',
        'value_patient_attended',
        'value_hour_night',
        'created_at',
        'updated_at'

        ];


        public function positionid()
        {
            return $this->belongsTo(Position::class, 'id');
        }
}
