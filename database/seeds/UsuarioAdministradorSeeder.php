<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         //Crear cargo menu-rol


         DB::table('position')->insert([
            'position'=>strtoupper('INGENIERO'),
            'salary'=>3120000,
            'value_hour'=>13000,
            'value_hour_add'=>13000,
            'value_patient_attended'=>0,
            'value_hour_night'=>22750,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
              ]);




       DB::table('usuario')->insert([
            'papellido'=>strtoupper('RODRIGUEZ'),
            'sapellido'=>strtoupper('LIZARAZO'),
            'pnombre'=>strtoupper('JULIAN'),
            'snombre'=>strtoupper('ANDRES'),
            'tipo_documento'=>strtoupper('CC'),
            'documento'=>'16942518',
            'usuario'=>'Juliandrp',
            'password'=>bcrypt('123456'),
            'remenber_token'=>bcrypt('123456'),
            'email'=>'sistemas@oportunidaddevida.com.co',
            'celular'=>'3008294892',
            'observacion'=>strtoupper('Ingeniero de Sistemas'),
            'ips'=>strtoupper('Oportunidad de Vida IPS'),
            'activo'=>'1',
            'cargo_id'=>1,
            'type_salary'=>1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);




        DB::table('usuario_rol')->insert([

            'rol_id'=>1,
            'usuario_id'=>1,



        ]);


        //Creación de menu

        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Admin',
            'url'=>'#',
            'orden'=>1,
            'icono'=>'far fa-building'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Lista de Menus',
            'url'=>'admin/menu',
            'orden'=>1,
            'icono'=>'fa fa-cog fa-spin fa-3x fa-fw'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Crear_menu',
            'url'=>'admin/menu/crear',
            'orden'=>2,
            'icono'=>'fas fa-clipboard-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Roles',
            'url'=>'admin/rol',
            'orden'=>3,
            'icono'=>'fa fa-list'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Asignar Menus',
            'url'=>'admin/menu-rol',
            'orden'=>4,
            'icono'=>'fa fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Registro Usuarios',
            'url'=>'#',
            'orden'=>2,
            'icono'=>'fa fa-users'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Registrar Turnos',
            'url'=>'#',
            'orden'=>5,
            'icono'=>'fas fa-clinic-medical'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 7,
            'nombre'=>'Reporte Turnos',
            'url'=>'hoursxuser',
            'orden'=>1,
            'icono'=>'fas fa-book-medical'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 6,
            'nombre'=>'Registrar Usuario',
            'url'=>'usuario',
            'orden'=>1,
            'icono'=>'fas fa-user-plus'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Registro Cargos',
            'url'=>'usuario',
            'orden'=>3,
            'icono'=>'fas fa-chart-line'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 10,
            'nombre'=>'Registrar Cargo',
            'url'=>'position',
            'orden'=>1,
            'icono'=>'fas fa-plus-circle'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Supervisar Turnos',
            'url'=>'#',
            'orden'=>4,
            'icono'=>'fas fa-tasks'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 12,
            'nombre'=>'Validar Turnos',
            'url'=>'informesh',
            'orden'=>1,
            'icono'=>'fas fa-check-double'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 12,
            'nombre'=>'Informe Liquidado',
            'url'=>'informe-liquid',
            'orden'=>2,
            'icono'=>'fas fa-file-invoice-dollar fa-2x'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 0,
            'nombre'=>'Nomina fijos',
            'url'=>'#',
            'orden'=>5,
            'icono'=>'fas fa-file-invoice-dollar fa-2x'
        ]);
        DB::table('menu')->insert([

            'menu_id'=> 15,
            'nombre'=>'Crear nomina',
            'url'=>'nominaf',
            'orden'=>1,
            'icono'=>'fas fa-money-check-alt'
        ]);



        //Relación menu-rol

        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 1
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 2
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 3
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 4
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 5
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 7
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 8
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 6
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 9
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 6
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 9
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 7
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 2,
            'menu_id'=> 8
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 10
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 11
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 12
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 13
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 14
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 15
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 16
        ]);
    }
}
