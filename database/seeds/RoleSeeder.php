<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role Administrador
        $roleA = Role::create([
            'name' => 'admin',
            'description' => 'Administrador'
        ]);
        $roleM = Role::create([
            'name' => 'mantenedor',
            'description' => 'Resp. de CRUD'
        ]);
        $roleU = Role::create([
            'name' => 'user',
            'description' => 'Usuario' // Clientes
        ]);

        $roleA->givePermissionTo([
            'access_dashboard',
            'access_permission',
            'create_store',
            'save_store',
            'edit_store',
            'update_store',
            'destroy_store',
            'restore_store'
        ]);

        $roleM->givePermissionTo([
            'access_dashboard',
            'create_store',
            'save_store',
            'edit_store',
            'update_store',
            'destroy_store'
        ]);
    }
}
