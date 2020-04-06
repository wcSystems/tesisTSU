<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Grado;
use App\Seccion;
use App\Turno;
use App\Sexo;
use App\Boolean;
use App\Deporte;
use App\Parentesco;
use App\Social;
use App\Trabajo;
use App\Vision;

class Table_Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $var = [
            ['firstname' => 'Anthony','lastname' => 'Carriedo','email' => 'wcarriedo','correo'=>'anthonycarriedo2013@gmail.com','doc'=>'25047058','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','profile' => 'https://lorempixel.com/100/100/?17277','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Adriana','lastname' => 'Duran','email' => 'zarraza99','correo'=>'zarraza99@gmail.com','doc'=>'26581823','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','profile' => 'https://lorempixel.com/100/100/?45277','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Hugo','lastname' => 'Garcia','email' => 'hgarcia','correo'=>'hgarcia@gmail.com','doc'=>'87654321','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','profile' => 'https://lorempixel.com/100/100/?47277','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Jose','lastname' => 'Tortolero','email' => 'jtortolero','correo'=>'jtortolero@gmail.com','doc'=>'87654329','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '3','profile' => 'https://lorempixel.com/100/100/?47277','created_at'=>now(),'updated_at'=>now()]
        ];
        User::insert($var);

        $var4 = [
            ['descripcion' => 'No definido'],
            ['descripcion' => 'Maternal I'],
            ['descripcion' => 'Maternal II'],
            ['descripcion' => 'Maternal III'],
            ['descripcion' => 'Primer Grado'],
            ['descripcion' => 'Segundo Grado'],
            ['descripcion' => 'Tercer Grado'],
            ['descripcion' => 'Cuarto Grado'],
            ['descripcion' => 'Quinto Grado'],
            ['descripcion' => 'Sexto Grado'],
            ['descripcion' => 'Primer Año'],
            ['descripcion' => 'Segundo Año'],
            ['descripcion' => 'Tercer Año'],
            ['descripcion' => 'Cuarto Año Secretariado'],
            ['descripcion' => 'Cuarto Año Electricidad'],
            ['descripcion' => 'Cuarto Año Refrigeracion'],
            ['descripcion' => 'Cuarto Año Maquinas y Herramientas'],
            ['descripcion' => 'Quinto Año Secretariado'],
            ['descripcion' => 'Quinto Año Electricidad'],
            ['descripcion' => 'Quinto Año Refrigeracion'],
            ['descripcion' => 'Quinto Año Maquinas y Herramientas'],
            ['descripcion' => 'Sexto Año Secretariado'],
            ['descripcion' => 'Sexto Año Electricidad'],
            ['descripcion' => 'Sexto Año Refrigeracion'],
            ['descripcion' => 'Sexto Año Maquinas y Herramientas'],
        ];
        Grado::insert($var4);

        DB::table('seccions')->delete();
        $var5 = [
            ['descripcion' => 'No definido'],
            ['descripcion' => 'A'],
            ['descripcion' => 'B'],
        ];
        Seccion::insert($var5);

        DB::table('turnos')->delete();
        $var6 = [
            ['descripcion' => 'No definido'],
            ['descripcion' => 'Mañana'],
            ['descripcion' => 'Tarde'],
            ['descripcion' => 'Todo el dia'],
        ];
        Turno::insert($var6);

        DB::table('sexos')->delete();
        $var7 = [
            ['descripcion' => 'No definido'],
            ['descripcion' => 'Femenino'],
            ['descripcion' => 'Masculino'],
        ];
        Sexo::insert($var7);

        DB::table('booleans')->delete();
        $var8 = [
            ['descripcion' => 'Si'],
            ['descripcion' => 'No'],
        ];
        Boolean::insert($var8);

        DB::table('deportes')->delete();
        $var9 = [
            ['descripcion' => 'Futbol'],
            ['descripcion' => 'Beisbol'],
        ];
        Deporte::insert($var9);

        DB::table('parentescos')->delete();
        $var10 = [
            ['descripcion' => 'Madre'],
            ['descripcion' => 'Padre'],
        ];
        Parentesco::insert($var10);

        DB::table('socials')->delete();
        $var11 = [
            ['descripcion' => 'Facebook'],
            ['descripcion' => 'Instagram'],
        ];
        Social::insert($var11);

        DB::table('trabajos')->delete();
        $var12 = [
            ['descripcion' => 'Mesero'],
            ['descripcion' => 'Desarrollador'],
        ];
        Trabajo::insert($var12);

        DB::table('visions')->delete();
        $var11 = [
            ['descripcion' => 'Deficiencia Visual Alta','code' => '1-20/200'],
            ['descripcion' => 'Deficiencia Visual Alta','code' => '2-20/100'],
            ['descripcion' => 'Deficiencia Visual Alta','code' => '3-20/70'],
            ['descripcion' => 'Deficiencia Visual Moderada','code' => '4-20/50'],
            ['descripcion' => 'Deficiencia Visual Moderada','code' => '5-20/40'],
            ['descripcion' => 'Deficiencia Visual Leve','code' => '6-20/30'],
            ['descripcion' => 'Deficiencia Visual Leve','code' => '7-20/25'],
            ['descripcion' => 'Normal','code' => '8-20/20'],
            ['descripcion' => 'Sobre Normal','code' => '9-20/15'],
            ['descripcion' => 'Sobre Normal','code' => '10-20/13'],
            ['descripcion' => 'Sobre Normal','code' => '11-20/10'],
        ];
        Vision::insert($var11);
    }
}
