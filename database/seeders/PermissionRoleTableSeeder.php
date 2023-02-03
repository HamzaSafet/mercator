<?php

namespace Database\Seeders;

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $user_permissions = $admin_permissions->filter(function ($permission) {
            return  substr($permission->title, 0, 5) != 'user_' &&
                    substr($permission->title, 0, 5) != 'role_' &&
                    substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);

        $auditor_permissions = $admin_permissions->filter(function ($permission) {
            return  substr($permission->title, 0, 5) != 'user_' &&
                    substr($permission->title, 0, 5) != 'role_' &&
                    substr($permission->title, 0, 11) != 'permission_' &&
                    (
                        substr($permission->title, strlen($permission->title)-5, strlen($permission->title)) == '_show' ||
                        substr($permission->title, strlen($permission->title)-7, strlen($permission->title)) == '_access'
                    );
        });
        Role::findOrFail(3)->permissions()->sync($auditor_permissions);

        $cartographer_permissions = $admin_permissions->filter(function ($permission) {
           return
               str_starts_with($permission->title, 'papplication_') ||
               str_starts_with($permission->title, 'm_application_') ||
               str_starts_with($permission->title, 'application_service_') ||
               str_starts_with($permission->title, 'database_') ||
               str_starts_with($permission->title, 'flux_') ||
               str_starts_with($permission->title, 'application_block_') ||
               str_starts_with($permission->title, 'application_module_');
        });
        Role::findOrFail(4)->permissions()->sync($cartographer_permissions);
    }
}
