<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        

        # Table Admin
                Permission::create(['name' => 'Read List Admins']);
                Permission::create(['name' => 'Read Admin']);
                Permission::create(['name' => 'Create Admin']);
                Permission::create(['name' => 'Edit Admin']);
                Permission::create(['name' => 'Destroy Admin']);
                Permission::create(['name' => 'Destroy List Admins']);

        # Table User
                Permission::create(['name' => 'Read List Users']);
                Permission::create(['name' => 'Read User']);
                Permission::create(['name' => 'Create User']);
                Permission::create(['name' => 'Edit User']);
                Permission::create(['name' => 'Destroy User']);
                Permission::create(['name' => 'Destroy List Users']);

        # Table JobSeeker
                Permission::create(['name' => 'Read List JobSeekers']);
        $recruiterPermissions = Permission::create(['name' => 'Read JobSeeker']);
                Permission::create(['name' => 'Create JobSeeker']);
                Permission::create(['name' => 'Edit JobSeeker']);
                Permission::create(['name' => 'Destroy JobSeeker']);
                Permission::create(['name' => 'Destroy List JobSeekers']);

        # Table Recruiter
                Permission::create(['name' => 'Read List Recruiters']);
                Permission::create(['name' => 'Read Recruiter']);
                Permission::create(['name' => 'Create Recruiter']);
                Permission::create(['name' => 'Edit Recruiter']);
                Permission::create(['name' => 'Destroy Recruiter']);
                Permission::create(['name' => 'Destroy List Recruiters']);

        # Table Offer
        $jobSeekerPermissions = Permission::create(['name' => 'Read List Offers']);
                Permission::create(['name' => 'Read Offer']);
                Permission::create(['name' => 'Create Offer']);
                Permission::create(['name' => 'Edit Offer']);
                Permission::create(['name' => 'Destroy Offer']);
                Permission::create(['name' => 'Destroy List Offers']);

        # Table Postulate
                Permission::create(['name' => 'Read List Postulates']);
                Permission::create(['name' => 'Read Postulate']);
                Permission::create(['name' => 'Create Postulate']);
                Permission::create(['name' => 'Edit Postulate']);
                Permission::create(['name' => 'Destroy Postulate']);
                Permission::create(['name' => 'Destroy List Postulates']);

        # Table Chat
                Permission::create(['name' => 'Read List Chats']);
                Permission::create(['name' => 'Read Chat']);
                Permission::create(['name' => 'Create Chat']);
                Permission::create(['name' => 'Edit Chat']);
                Permission::create(['name' => 'Destroy Chat']);
                Permission::create(['name' => 'Destroy List Chats']);

        # Table Post
                Permission::create(['name' => 'Read List Posts']);
                Permission::create(['name' => 'Read Post']);
                Permission::create(['name' => 'Create Post']);
                Permission::create(['name' => 'Edit Post']);
                Permission::create(['name' => 'Destroy Post']);
                Permission::create(['name' => 'Destroy List Posts']);

        # Table Review
                Permission::create(['name' => 'Read List Reviews']);
                Permission::create(['name' => 'Read Review']);
                Permission::create(['name' => 'Create Review']);
                Permission::create(['name' => 'Edit Review']);
                Permission::create(['name' => 'Destroy Review']);
                Permission::create(['name' => 'Destroy List Reviews']);

        # Table Comment
                Permission::create(['name' => 'Read List Comments']);
                Permission::create(['name' => 'Read Comment']);
                Permission::create(['name' => 'Create Comment']);
                Permission::create(['name' => 'Edit Comment']);
                Permission::create(['name' => 'Destroy Comment']);
                Permission::create(['name' => 'Destroy List Comments']);

        # Table React
                Permission::create(['name' => 'Read List Reacts']);
                Permission::create(['name' => 'Read React']);
                Permission::create(['name' => 'Create React']);
                Permission::create(['name' => 'Edit React']);
                Permission::create(['name' => 'Destroy React']);
                Permission::create(['name' => 'Destroy List Reacts']);

        # Table Reply
                Permission::create(['name' => 'Read List Replys']);
                Permission::create(['name' => 'Read Reply']);
                Permission::create(['name' => 'Create Reply']);
                Permission::create(['name' => 'Edit Reply']);
                Permission::create(['name' => 'Destroy Reply']);
                Permission::create(['name' => 'Destroy List Replys']);

        // Create admin role and assign recruiter permissions
        $adminRole = Role::create(['name' => 'recruiter']);
        $adminRole->givePermissionTo($recruiterPermissions);

        // Create admin role and assign jobSeeker permissions
        $adminRole = Role::create(['name' => 'jobSeeker']);
        $adminRole->givePermissionTo($jobSeekerPermissions);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('hakima@gmail.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
