<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class AddTeacherFeedbackPermissions extends Migration
{
    public function up()
    {
        $titles = [
            'teacher_feedback_access',
            'teacher_feedback_show',
            'teacher_feedback_delete',
        ];

        foreach ($titles as $title) {
            $permission = Permission::firstOrCreate(['title' => $title]);

            Role::where('title', 'Admin')->each(function ($role) use ($permission) {
                $role->permissions()->syncWithoutDetaching([$permission->id]);
            });
        }
    }

    public function down()
    {
        Permission::whereIn('title', [
            'teacher_feedback_access',
            'teacher_feedback_show',
            'teacher_feedback_delete',
        ])->delete();
    }
}
