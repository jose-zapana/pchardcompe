<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Customer;

class CustomerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 2 customers
        $user = User::create([
            'name'=>''
        ]);
        Customer::create([
            'user_id' => $user->id,
        ]);
        // En su table mostrar un boton por cada cliente para agregar
        // sus direcciones
    }
}
