<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = ['create-records', 'edit-records', 'delete-records', 'manage-users'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $dataEntry = Role::firstOrCreate(['name' => 'data-entry']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to roles
        $dataEntry->syncPermissions(['create-records']);
        $admin->syncPermissions($permissions);

        // Create users
        $user1 = User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin User',
            'password' => bcrypt('admin123')
        ]);

        $user2 = User::create([
            'email' => 'data@gmail.com',
            'name' => 'Data Entry User',
            'password' => bcrypt('data123')
        ]);

        $user3 = User::create([
            'email' => 'axcel@gmail.com',
            'name' => 'User',
            'password' => bcrypt('axcel123')
        ]);

        // Assign roles to users
        $user1->assignRole('admin');
        $user2->assignRole('data-entry');
        $user3->assignRole('');
    }
}
