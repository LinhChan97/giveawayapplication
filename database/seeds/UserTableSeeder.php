<?php

use Illuminate\Database\Seeder;
use App\Models\V1\User;
use App\Models\V1\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\Models\V1\User::class, 1)->create(['name' => 'admin', 'username' => 'admin']);
    }
}
