<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
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
                'category_name' => 'Articles-Satu',
                'slug' => Str::slug('Articles-Satu')
               ),
            array(
                'category_name' => 'Articles-Dua',
                'slug' => Str::slug('Articles-Dua')
            ),
            array(
            'category_name' => 'Articles-Tiga',
            'slug' => Str::slug('Articles-Tiga')
            )
            );
        \App\Models\Articles\CategoryArticlesModel::insert($data);
    }
}
