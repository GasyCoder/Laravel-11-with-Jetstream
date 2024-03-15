<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin',
            'label' => 'Administrateur',
            'description' => 'Administrateur de Système'
        ]);
        $user = Role::create([
            'name' => 'user',
            'label' => 'user',
            'description' => 'user simple'
        ]);

        $admin->givePermissionTo([
            'manage_app',
            'user-simple',
        ]);

        $user->givePermissionTo([
            'user-simple',
        ]);

    }
}
