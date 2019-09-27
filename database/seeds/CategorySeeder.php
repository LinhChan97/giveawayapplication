<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Food', 'Book', 'Clothing', 'Baby care', 'Animal shelter', 'Disaster Relief', 'Cold weather', 'School Supplies'];
        foreach ($categories as $cat) {
            factory(App\Models\V1\Category::class, 1)->create([
                'name' => $cat,
            ]);
        }
    }
}
