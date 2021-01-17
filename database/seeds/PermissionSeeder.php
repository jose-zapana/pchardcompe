<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Módulo Permisos
        // Módulo Tiendas
        Permission::create([
            'name' => 'create_store',
            'description' => 'Visualizar formulario de creación' // Permiso para ver el formulario
        ]);
        Permission::create([
            'name' => 'save_store',
            'description' => 'Guardar información de tienda' // Permiso para guardar una tienda
        ]);

        Permission::create([
            'name' => 'edit_store',
            'description' => 'Visualizar formulario de edición'
        ]);

        Permission::create([
            'name' => 'update_store',
            'description' => 'Actualizar datos de la tienda'
        ]);

        Permission::create([
            'name' => 'destroy_store',
            'description' => 'Eliminar tiendas'
        ]);

        Permission::create([
            'name' => 'restore_store',
            'description' => 'Restaurar tiendas' // Ver el formulario de restaurado
                                                 // Restaurar la tienda
        ]);

        // Módulo Categorías
        // Módulo Productos
        // Módulo Clientes
        // Módulo Pedidos
        // Módulo Método Pago
        // Módulo Método Envío

    }
}
