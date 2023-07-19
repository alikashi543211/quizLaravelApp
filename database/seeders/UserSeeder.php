<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@softpyramid.us',
                'password' => Hash::make('softpyramid123'),
                'role_id' => ROLE_ADMIN,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@softpyramid.us',
                'password' => Hash::make('softpyramid123'),
                'role_id' => ROLE_USER,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
