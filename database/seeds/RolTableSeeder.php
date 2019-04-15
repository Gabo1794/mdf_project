<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rol')->insert([
        'rol' => 'Rol 1',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s'),
      ]);
    }
}
