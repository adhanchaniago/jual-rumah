<?php

use Illuminate\Database\Seeder;
use App\Perumahan;

class PerumahansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perumahan::create([
            'name' => 'Perumahan Bella Oktaviary',
            'address' => 'Jl. Nusatantara',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quisquam doloremque debitis deserunt corrupti quidem cumque totam fuga officia culpa aperiam quibusdam iusto autem pariatur, quaerat rerum suscipit fugit mollitia?',
            'status' => 'active'
        ]);

        $this->command->info('Create Fake Data Perumahan');
    }
}
