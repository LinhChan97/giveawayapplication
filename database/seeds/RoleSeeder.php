<?php

use Illuminate\Database\Seeder;
use App\Models\V1\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::LIST_ROLE;
        foreach ($roles as $role) {
            factory(App\Models\V1\Role::class, 1)->create([
                'name' => $role
            ]);
        }
    }
}
