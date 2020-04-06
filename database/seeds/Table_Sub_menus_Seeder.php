<?php

use Illuminate\Database\Seeder;
use App\Sub_menu;

class Table_Sub_menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('sub_menus')->delete();
        $var = [
            
            ['name' => 'Alumnos','url' => '/Alumnos','menu_id' => '2','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Grados','url' => '/Grados','menu_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Secciones','url' => '/Secciones','menu_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Turnos','url' => '/Turnos','menu_id' => '4','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Reportes','url' => '/Reportes','menu_id' => '5','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Usuarios','url' => '/Usuarios','menu_id' => '6','created_at'=>now(),'updated_at'=>now()],
        ];
        Sub_menu::insert($var);
    }
}
