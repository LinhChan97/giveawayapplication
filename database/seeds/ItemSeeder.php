<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\V1\Item::class, 10)->create([
            'name' => 'Item '.rand(1,100)
        ]);
    }
}
