<?php

use Illuminate\Database\Seeder;
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
            'salary'=>3700000,
            'value_hour'=>12500,
            'value_hour_add'=>12500,
            'value_patient_attended'=>0,
            'value_hour_night'=>22500
              ]);




       DB::table('usuario')->insert([
            'papellido'=>strtoupper('Castro'),
            'sapellido'=>strtoupper('Galeano'),
            'pnombre'=>strtoupper('Jhonnathan'),
            'snombre'=>null,
            'tipo_documento'=>strtoupper('CC'),
            'documento'=>'1130629762',
            'usuario'=>'jcastro',
            'password'=>bcrypt('123456'),
            'remenber_token'=>bcrypt('123456'),
            'email'=>'castrokof@gmail.com',
            'celular'=>'3175018125',
            'observacion'=>strtoupper('Prueba'),
            'ips'=>strtoupper('atencion fidem s.a.s'),
            'activo'=>'1',
            'cargo_id'=>1
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
            'nombre'=>'Usuario',
            'url'=>'#',
            'orden'=>4,
            'icono'=>'fa fa-users'
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

    }
}
