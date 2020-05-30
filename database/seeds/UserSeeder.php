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
      'name' => 'Diego Calvo',
      'email' => 'dfcalvo@uao.edu.co',
      'password' => bcrypt('12345678'),
      'role' => 'aux'
    ]);

    User::create([
     'name' => 'Jaime Sarria',
     'email' => 'jasarria@uao.edu.co',
     'password' => bcrypt('12345678'),
     'role' => 'aux'
   ]);

    User::create([
     'name' => 'Cliente 1',
     'email' => 'cliente1@uao.edu.co',
     'password' => bcrypt('12345678'),
     'role' => 'client'
   ]);

   User::create([
    'name' => 'Andres Piedra',
    'email' => 'ajpiedrahita@uao.edu.co',
    'password' => bcrypt('12345678'),
    'role' => 'client'
  ]);

    }
}
