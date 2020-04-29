<?php

use Illuminate\Database\Seeder;

class tipo_produto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\tipo_produto::class, 5)->create();
        
    }
}
