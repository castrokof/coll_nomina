<?php

namespace App\Models\nomina;

use App\Models\Nomina\nominaliquid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';
    protected $fillable = [
    'papellido',
    'sapellido',
    'pnombre',
    'snombre',
    'tipo_documento',
    'documento',
    'email',
    'celular',
    'observacion',
    'ips',
    'position',
    'eps',
    'arl',
    'afp',
    'fc',
    'salary',
    'value_hour',
    'value_patient_attended',
    'value_add_security_social',
    'value_transporte',
    'value_salary_add',
    'name_bank',
    'account',
    'type_account',
    'type_contrat',
    'date_in',
    'date_out',
    'date_incontrat',
    'date_endcontrat',
    'activo'
    ];

    public function liquidacion()
    {
        return $this->hasMany(nominaliquid::class, 'empleado_id');
    }



}
