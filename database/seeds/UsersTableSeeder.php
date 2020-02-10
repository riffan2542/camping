<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat Role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

         //Membuat sample admin
         $admin = new User(); 
         $admin->name ="Admin";
         $admin->email="admin2542@gmail.com";
         $admin->password =bcrypt('persib2014');
         $admin->save();
         $admin->attachRole($adminRole);
    }
}
