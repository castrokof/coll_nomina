<?php

namespace App\Models\Paliativos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasePaliativos extends Model
{
    protected $table = 'bdpaliativos';

    protected $fillable = [

            'surname',
            'ssurname',
            'fname',
            'sname',
            'type_document',
            'document',
            'date_birth',
            'municipality',
            'address',
            'celular',
            'phone',
            'email',
            'observacion',
            'user_id',
            'date_in',
            'dead',
            'date_dead',
            'state',
            'type',
            'future1',
            'future2',
            'future3', //Sexo
            'future4', //Diagnostico
            'future5' //Ips
    ];


    public function userid_bdpaliativos()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function obspaliativos(){
        return $this->hasMany(ObsPaliativos::class, 'pac_id');
    }
}
