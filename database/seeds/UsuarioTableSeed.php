<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->delete();
        App\User::create(array(
            'usuario' => 'mariocosta',
            'senha' => bcrypt('teste'),
        ));
    }
}
