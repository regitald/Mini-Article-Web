<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
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
                'menu_name' => 'Manage Users',
                'menu_url' => 'user'
               ),
            array(
                'menu_name' => 'Article Categories',
                'menu_url' => 'category'
                ),
            array(
                'menu_name' => 'Articles',
                'menu_url' => 'articles'
                )
            );
        \App\Models\Admin\MenuModel::insert($data);
    }
}
