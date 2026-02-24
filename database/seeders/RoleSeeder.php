<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','teacher','student'];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role, 'guard_name' => 'web'],
                ['name' => $role, 'guard_name' => 'web']
            );
        }

        // Assign roles to specific users safely
        $admin = User::find(1);
        if ($admin) {
            $admin->assignRole('admin');
        }

        $teacher = User::find(2);
        if ($teacher) {
            $teacher->assignRole('teacher');
        }

        $student = User::find(3);
        if ($student) {
            $student->assignRole('student');
        }
    }
}
