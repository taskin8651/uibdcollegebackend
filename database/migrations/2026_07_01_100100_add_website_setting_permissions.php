<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class AddWebsiteSettingPermissions extends Migration
{
    public function up()
    {
        $permission = Permission::firstOrCreate(['title' => 'website_setting_access']);

        Role::where('title', 'Admin')->each(function ($role) use ($permission) {
            $role->permissions()->syncWithoutDetaching([$permission->id]);
        });
    }

    public function down()
    {
        Permission::where('title', 'website_setting_access')->delete();
    }
}
