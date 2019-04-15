<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('usuarios')->insert([
        'id_mrm' => 1,
        'usuario' => 'AdminUser',
        'password' => bcrypt('12345'),
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s'),
      ]);
    }
}
