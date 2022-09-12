<?php

namespace App\Listeners;

use App\Events\UpdateNovedadEmp;
use App\Models\nomina\EmpleadosNovedades;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CratedAfterEmp
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UpdateNovedadEmp $event)
    {
        EmpleadosNovedades::create($event->all());

    }
}
