<?php

use Illuminate\Database\Seeder;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::pluck('id')->toArray();

        $role = Role::create(['name'=>'super-admin']);
        $role->syncPermissions($permission);


        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@algeriainvest.com',
            'password' => bcrypt('admin@AI123')
        ]);

        $user->assignRole([$role->id]);
    }
}
