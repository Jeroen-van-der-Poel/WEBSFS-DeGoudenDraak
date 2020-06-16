<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_waitress = Role::where('name', 'Waitress')->first();
        $role_cashier = Role::where('name', 'Cashier')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@dgd.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $waitress = new User();
        $waitress->name = 'Serveerster';
        $waitress->email = 'waitress@dgd.com';
        $waitress->password = bcrypt('waitress');
        $waitress->save();
        $waitress->roles()->attach($role_waitress);

        $cashier = new User();
        $cashier->name = 'Kassamedewerker';
        $cashier->email = 'cashier@dgd.com';
        $cashier->password = bcrypt('cashier');
        $cashier->save();
        $cashier->roles()->attach($role_cashier);

        $customer = new User();
        $customer->name = 'Klant';
        $customer->email = 'customer@dgd.com';
        $customer->password = bcrypt('customer');
        $customer->save();
        $customer->roles()->attach($customer);

    }
}
