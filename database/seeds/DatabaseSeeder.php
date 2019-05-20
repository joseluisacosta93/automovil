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
          DB::table('status')->insert([
          	'id' => 1,
            'name' => "activo"
            
            
        ],[
          	'id' => 2,
            'name' => "inactivo"
            
            
        ]);
    }
}
