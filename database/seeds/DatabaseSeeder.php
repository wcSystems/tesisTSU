<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'roles',
            'users',
            'menus',
            'sub_menus',
            'role_sub_menu',
        ]);

        
        $this->call(Table_Roles_Seeder::class);
        $this->call(Table_Users_Seeder::class);
        $this->call(Table_Menus_Seeder::class);
        $this->call(Table_Sub_menus_Seeder::class);
        $this->call(Table_Role_sub_menu_Seeder::class);
    }

    protected function truncateTables(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
