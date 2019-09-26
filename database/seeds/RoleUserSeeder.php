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
        $adminRole = Role::first();
        foreach (User::all() as $user) {
            if($user->name == 'admin') {
                $user->roles()->sync($adminRole);
            }
        }
    }
}
