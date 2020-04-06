<?php

use Illuminate\Database\Seeder;
use App\Role;

class Table_Roles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = [
            ['name' => 'Administrador','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Coordinador','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Docente','created_at'=>now(),'updated_at'=>now()],
        ];
        Role::insert($var);
    }
}
