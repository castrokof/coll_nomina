<?php

namespace App\Events;

use App\Models\nomina\Empleados;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateNovedadEmp
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $Empleados;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Empleados $Empleados)
    {

        $this->Empleados = $Empleados;

    }
}
