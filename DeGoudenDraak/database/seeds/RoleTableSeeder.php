<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->save();

        $role_cashier = new Role();
        $role_cashier->name = 'Cashier';
        $role_cashier->save();

        $role_company = new Role();
        $role_company->name = 'Waitress';
        $role_company->save();
    }
}
