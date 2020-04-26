<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
