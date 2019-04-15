<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MinisterioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ministerios')->insert([
          'ministerio' => 'Ministerio 1',
          'created_at' => date('Y-m-d H:m:s'),
          'updated_at' => date('Y-m-d H:m:s'),
      ]);
    }
}
