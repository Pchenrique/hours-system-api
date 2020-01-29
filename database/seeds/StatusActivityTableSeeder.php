<?php

use Illuminate\Database\Seeder;
use App\StatusActivity;

class StatusActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusActivity::create([
            'name' => 'Em Analise',
        ]);

        StatusActivity::create([
            'name' => 'Aceito',
        ]);

        StatusActivity::create([
            'name' => 'Recusado',
        ]);
    }
}
