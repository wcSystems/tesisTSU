<?php

use Illuminate\Database\Seeder;
use App\Menu;

class Table_Menus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('menus')->delete();
        $var = [
            ['nombre' => 'Examenes','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Alumnos','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Evaluaciones','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Aulas','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Reportes','icon' => 'fal fa-address-card','created_at'=>now(),'updated_at'=>now()],
            ['nombre' => 'Configuracion','icon' => 'fal fa-cog','created_at'=>now(),'updated_at'=>now()]
        ];
        Menu::insert($var);
    }
}
