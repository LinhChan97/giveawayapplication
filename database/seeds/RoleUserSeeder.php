<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Role;
use App\Models\V1\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $user->roles()->sync(Role::where('name', $user->name)->firstOrFail());
        }
    }
}
