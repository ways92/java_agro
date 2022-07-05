<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin99@admin.com',
            'level' => 'admin',
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),

        ]);

    }
}
