<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(RolesPermissionsTableSeeder::class);

        //
        $permissions=[
            [
                'name' => "users",
                'display_name' => "users",
                'description' => "Manage each and every user",
            ],
            [
                'name' => "admin_roles",
                'display_name' => "Admin Roles",
                'description' => "Manage all the roles and permissions",
            ],
            [
                'name' => 'create_business',
                'display_name' => 'Create Business',
                'description' => 'Allow user to create a new Business',
            ],
            [
                'name' => 'manage_packages',
                'display_name' => 'Manage Package',
                'description' => 'Allow user to create a manage Packages',
            ],
            [
                'name' => 'manage_sms',
                'display_name' => 'Manage Sms',
                'description' => 'Allow user to manage Sms',
            ],

        ];

        //create a super admin to login with all the roles
        $user=new \App\User();
        $user->name='Super Admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('password');
        $user->user_type=0;
        $user->save();

        //create the super admin role this is all we require. The rest of the guys will manage themselves
        $role=new \App\Models\Role();
        $role->name='super_admin';
        $role->display_name='Super Admin';
        $role->description='A user who can do anythng on the system';

        $role->Save();

        foreach ($permissions as $permission){
            $permission=\App\Models\Permission::create($permission);
            $role->attachPermission($permission);
        }

        //assign super admin the role
        $user->attachRole($role);
    }
}
