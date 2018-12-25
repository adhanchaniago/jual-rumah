<?php

use Illuminate\Database\Seeder;
use App\RumahType;

class RumahTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['36','45','75'];

        foreach ($types as $type) {
            RumahType::create([
                'type' => $type
            ]);
        }

        $this->command->info('Create Fake Types');
    }
}
