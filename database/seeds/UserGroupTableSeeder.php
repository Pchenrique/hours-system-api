<?php

use Illuminate\Database\Seeder;
use App\UserGroup;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserGroup::create([
            'name' => 'Aluno',
        ]);

        UserGroup::create([
            'name' => 'Coordenador',
        ]);

        UserGroup::create([
            'name' => 'Administrador_Instituicao',
        ]);

        UserGroup::create([
            'name' => 'Administrador_Geral',
        ]);
    }
}
