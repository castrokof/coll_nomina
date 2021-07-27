<?php

namespace App\Models\Nomina;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidationxuser extends Model
{

            protected $table = 'liquidationxuser';

            protected $fillable = [
                'date_pay',
                'hour_paid',
                'hour_add',
                'turn_night',
                'pay_period',
                'total_payment',
                'user_id'
                ];


                public function useridl()
                {
                    return $this->belongsTo(Usuario::class, 'id');
                }
}
