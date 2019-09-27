<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Cause;

class CauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $causes = ['Food Drive', 'Book Drive', 'Homelessness', 'Disaster relief', 'Coat Drive', 'School Supplies', 'Toy Drive', 'Military Drive'];
        foreach ($causes as $cause) {
            factory(App\Models\V1\Cause::class, 1)->create([
                'name' => $cause,
            ]);
        }
    }
}
