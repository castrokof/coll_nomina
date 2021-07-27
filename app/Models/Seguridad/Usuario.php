<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Cita;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use App\Models\Nomina\Hoursxuser;
use App\Models\Nomina\Liquidationxuser;
use App\Models\Nomina\Position;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';


    protected $fillable = [
        'papellido',
        'sapellido',
        'pnombre',
        'snombre',
        'tipo_documento',
        'documento',
        'usuario',
        'password',
        'remenber_token',
        'email',
        'celular',
        'observacion',
        'ips',
        'activo',
        'cargo_id'
    ];




    protected $hidden = ['password'];


    public function cargos(){
         return $this->belongsTo(Position::class, 'id');
    }


    public function hours(){
        return $this->hasMany(Hoursxuser::class, 'user_id');
    }

    public function hoursliquidation(){
        return $this->hasMany(Liquidationxuser::class, 'user_id');
    }






    public function roles1(){
        return $this->belongsToMany(Rol::class,'usuario_rol');
    }

       public function setSession(){

    $roles1 = $this->roles1()->get()->toArray();

        if (count($roles1) == 1) {
            Session::put(
                [
                    'rol_id' => $roles1[0]['id'],
                    'rol_nombre' => $roles1[0]['nombre'],
                    'usuario' => $this->usuario,
                    'usuario_id' => $this->id,
                    'profesion' => $this->profesion,
                    'especialidad' => $this->especialidad,
                    'email' => $this->email,
                    'activo'=>$this->activo
                ]
                );
        }

    }
    public function setPasswordAttribute($value)
    {
        if ( !empty ($value))
        {
            $this->attributes['password'] = Hash::make($value);
            $this->attributes['remenber_token'] = Hash::make($value);
        }
    }

    // public function historias(){
    //     return $this->belongsTo(Historia::class, 'usuario_id');
    // }

    // public function citas(){
    //     return $this->belongsTo(Cita::class, 'usuario_id');
    // }


}
