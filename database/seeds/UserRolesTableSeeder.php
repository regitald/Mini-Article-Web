<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
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
                'role_name' => 'admin'
               ),
            array(
                'role_name' => 'author'
               )
            );
        \App\Models\Admin\UserRolesModel::insert($data);
    }
}
