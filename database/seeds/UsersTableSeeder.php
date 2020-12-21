<?php

use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Jose Luis Maurich',
            'email' => 'jmaurich@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // secret
            'dni' => '17285207',
            'address' => 'Dr Luis Belastegui 4593',
            'phone' => '(011) 4636-2964)',
            'role' => 'admin', 
        ]);
        factory(User::class, 50)->create();
    }
}
