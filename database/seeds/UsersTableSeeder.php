<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'Kawakoi Blog',
            'email' => 'kawakoi@blog.com',
            'password' => bcrypt ('1234'),
            'role_id' => '1'
        ]);
    }
}
