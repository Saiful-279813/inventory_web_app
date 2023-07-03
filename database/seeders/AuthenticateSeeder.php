<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthenticateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  Admin Panel User */
        $admin_user = new Admin();
        $admin_user->name = 'Supper Admin';
        $admin_user->email = 'supper@admin.com';
        $admin_user->phone = '01920611821';
        $admin_user->password = Hash::make(12345678);
        $admin_user->save();

        
    }
}
