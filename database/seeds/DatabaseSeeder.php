<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $default = array(
            array('name' => 'Admin', 'username' => 'admin', 'email' => 'admin@admin.com', 'role' => 'Admin', 'password' => Hash::make('secret'),
        ));
        DB::table('users')->insert($default);
    }
}