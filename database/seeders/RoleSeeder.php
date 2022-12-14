<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Funcionario']);
        Permission::create(['name'=>'admin.register'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.manage'])->syncRoles([$role1]);
        Permission::create(['name'=>'operator.manage'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'home.index'])->syncRoles([$role1,$role2]);

        //$this->call(UserSeed::class);
        /*Permission::create(['name'=>'admin.register']);
        Permission::create(['name'=>'admin.register']);*/
    }
}
