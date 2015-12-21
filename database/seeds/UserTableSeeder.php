<?php

use Illuminate\Database\Seeder;
use Onlinecorrection\Models\User;
use Onlinecorrection\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class)->create([
            'name' => 'Coach',
            'email' => 'coach@gmail.com',
            'password' => bcrypt(123456),
            'role' => 'coach',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());


        factory(User::class)->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());


        factory(User::class)->create([
            'name' => 'Diogo',
            'email' => 'diogorcazevedo@gmail.com',
            'password' => bcrypt(123456),
            'role' => 'master',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

     /*   factory(User::class, 10)->create()->each(function ($u) {

            $u->client()->save(factory(Client::class)->make());
        });
      *
      */

    }
}
