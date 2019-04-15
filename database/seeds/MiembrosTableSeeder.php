<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MiembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('miembros')->insert([
        'nombre' => 'Usuario',
        'ap_pat' => 'Prueba',
        'ap_mat' => 'MDF',
        'edad' => '23',
        'fecha_nac' => '1994-10-17',
        'direccion' => 'Turquesa 27 Col. Estrella',
        'tel_fijo' => '10551484',
        'tel_cel' => '5555778712',
        'nac_espiritual' => 'SI',
        'consolidacion' => 'S',
        'peniel' => 'S',
        'bautismo_agua' => 'S',
        'bautismo_es' => 'S',
        'sanidad_total' => 'S',
        'curso1' => 'SI',
        'curso2' => 'SI',
        'curso3' => 'SI',
        'curso4' => 'SI',
        'curso5' => 'SI',
        'curso6' => 'SI',
        'curso7' => 'SI',
        'email' => 'sonic1794@gmail.com',
        'd07' => 'S',
        'oracion_familias' => 'S',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s'),
      ]);
    }
}
