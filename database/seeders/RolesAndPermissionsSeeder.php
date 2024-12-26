<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions for posts
        ModelsPermission::create(['name' => 'create posts']);
        ModelsPermission::create(['name' => 'edit posts']);
        ModelsPermission::create(['name' => 'delete posts']);
        ModelsPermission::create(['name' => 'view posts']);

        //create permission for user
        ModelsPermission::create(['name' => 'create users']);
        ModelsPermission::create(['name' => 'edit users']);
        ModelsPermission::create(['name' => 'delete users']);

        // Create roles and assign permissions
        $adminRole = ModelsRole::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['create posts', 'edit posts', 'delete posts', 'view posts', 'create users', 'edit users', 'delete users']);

        $editorRole = ModelsRole::create(['name' => 'editor']);
        $editorRole->givePermissionTo(['create posts', 'edit posts', 'view posts']);

        $user = User::find(1); // Replace with the user's ID

        // Assign a single role
        $user->assignRole('admin');
        
        //  $viewerRole = Role::create(['name' => 'viewer']);
        //  $viewerRole->givePermissionTo(['view posts']);
    }
}
