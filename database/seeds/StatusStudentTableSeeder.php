<?php

use Illuminate\Database\Seeder;
use App\StatusStudent;

class StatusStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusStudent::create([
            'name' => 'Inativo',
        ]);

        StatusStudent::create([
            'name' => 'Em Processo',
        ]);

        StatusStudent::create([
            'name' => 'Concluido',
        ]);
    }
}
