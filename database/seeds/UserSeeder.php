<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
       'name' => 'Andres Estiven',
       'email' => 'admin@hotmail.com',
       'password' => bcrypt('12345678'),
       'role' => 'admin'
     ]);

     User::create([
      'name' => 'Ñejo Calvo',
      'email' => 'elnejo@hotmail.com',
      'password' => bcrypt('12345678'),
      'role' => 'aux'
    ]);

    User::create([
     'name' => 'Cliente 1',
     'email' => 'cliente1@hotmail.com',
     'password' => bcrypt('12345678'),
     'role' => 'client'
   ]);

    }
}
