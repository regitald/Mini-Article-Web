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
        $data = array(
            array(
                'role_id' => 1,
                'fullname' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin2021'),
                'status' => 'active'
               ),
            array(
                'role_id' => 2,
                'fullname' => 'author',
                'email' => 'author@mail.com',
                'password' => Hash::make('author2021'),
                'status' => 'active'
               ),
            );
        \App\Models\Admin\UsersModel::insert($data);
    }
}
