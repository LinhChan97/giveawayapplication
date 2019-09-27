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
        for($i = 0; $i<10; $i++) {
            factory(App\Models\V1\User::class, 1)->create(['name' => Role::ADMIN_ROLE, 'username' => 'admin'.$i]);
            factory(App\Models\V1\User::class, 1)->create(['name' => Role::DONOR_ROLE, 'username' => 'donor'.$i]);
            factory(App\Models\V1\User::class, 1)->create(['name' => Role::CHARITY_ROLE, 'username' => 'charity'.$i]);
        }
    }
}
