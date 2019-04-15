<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MRMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('miembro_hasrol_hasministerio')->insert([
        'id_miembro' => 1,
        'id_rol' => 1,
        'id_ministerio' => 1,
        'activo' => 'S',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s'),
      ]);
    }
}
