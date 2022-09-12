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
        DB::table('menu')->insert([

            'menu_id'=> 1,
            'nombre'=>'Listas',
            'url'=>'#',
            'orden'=>'5',
            'icono'=>'fa fa-book'
        ]);

        DB::table('menu')->insert([

            'menu_id'=> 17,
            'nombre'=>'Detalle listas',
            'url'=>'detallelistas',
            'orden'=>'1',
            'icono'=>'fa fa-list'
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
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 17
        ]);
        DB::table('menu_rol')->insert([

            'rol_id'=> 1,
            'menu_id'=> 18
        ]);


        DB::table('listas')->insert([
            'slug'=>strtoupper('EMP'),
            'nombre'=>strtoupper('LISTA DE EMPRESAS'),
            'descripcion'=>strtoupper('LISTADO PARA CREAR LAS EMPRESAS'),
            'activo'=>'SI',
            'user_id'=>1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
              ]);
              DB::table('listas')->insert([
                'slug'=>strtoupper('BANK'),
                'nombre'=>strtoupper('BANCOS'),
                'descripcion'=>strtoupper('LISTA DE BANCOS'),
                'activo'=>'SI',
                'user_id'=>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                  ]);
                  DB::table('listas')->insert([
                    'slug'=>strtoupper('TYAC'),
                    'nombre'=>strtoupper('TYPE_ACCOUNT'),
                    'descripcion'=>strtoupper('LISTA DE TIPOS DE CUENTA'),
                    'activo'=>'SI',
                    'user_id'=>1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                      ]);


                      DB::table('listasdetalle')->insert([
                        ['slug'=>strtoupper('FIDEM'),'nombre'=>strtoupper('ATENCION FIDEM SAS'),'descripcion'=>strtoupper('IPS FIDEM'),
                        'activo'=>'SI', 'listas_id'=>1,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('MEDCOL'),'nombre'=>strtoupper('SALUD MEDCOL SAS'),'descripcion'=>strtoupper('FARMACIA MEDCOL'),
                        'activo'=>'SI', 'listas_id'=>1,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('TEMPUS'),'nombre'=>strtoupper('TEMPUS ATENCIÓN INTEGRAL SAS'),'descripcion'=>strtoupper('FARMACIA TEMPUS'),
                        'activo'=>'SI', 'listas_id'=>1,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

                        ['slug'=>strtoupper('DAVA'),'nombre'=>strtoupper('DAVIVIENDA'),'descripcion'=>strtoupper('DAVIVIENDA'),
                        'activo'=>'SI', 'listas_id'=>2,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('BOGA'),'nombre'=>strtoupper('BANCO DE BOGOTA'),'descripcion'=>strtoupper('BANCO DE BOGOTA'),
                        'activo'=>'SI', 'listas_id'=>2,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('BANC'),'nombre'=>strtoupper('BANCOLOMBIA'),'descripcion'=>strtoupper('BANCOLOMBIA'),
                        'activo'=>'SI', 'listas_id'=>2,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('AVVS'),'nombre'=>strtoupper('BANCO AV VILLAS'),'descripcion'=>strtoupper('BANCO AV VILLAS'),
                        'activo'=>'SI', 'listas_id'=>2,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

                        ['slug'=>strtoupper('AHOS'),'nombre'=>strtoupper('AHORROS'),'descripcion'=>strtoupper('AHORROS'),
                        'activo'=>'SI', 'listas_id'=>3,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ['slug'=>strtoupper('CORE'),'nombre'=>strtoupper('CORRIENTE'),'descripcion'=>strtoupper('CORRIENTE'),
                        'activo'=>'SI', 'listas_id'=>3,'user_id'=>1,  'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
                        ]);
    }
}
