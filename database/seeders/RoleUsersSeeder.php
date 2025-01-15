<?php

namespace Database\Seeders;

use App\Models\RoleUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User ada
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = ['manage tasks', 'view tasks', 'assign tasks'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $roles = [
            'supervisor' => ['manage tasks', 'view tasks', 'assign tasks'],
            'sales' => ['view tasks'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Create users and assign roles
        $users = [
            [
                'name' => 'Supervisor User',
                'email' => 'supervisor@example.com',
                'photo' => null,
                'pin' => bcrypt('5678'),
                'role' => 'supervisor',
            ],
            [
                'name' => 'Sales User',
                'email' => 'sales@example.com',
                'photo' => null,
               'pin' => bcrypt('5678'),
                'role' => 'sales',
            ],
        ];

        foreach ($users as $userData) {
            $user = RoleUsers::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'photo' => $userData['photo'],
                    'pin' => $userData['pin'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            $user->assignRole($userData['role']);
        }
    }
}
