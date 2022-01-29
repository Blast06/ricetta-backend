<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2021-09-07 06:15:30',
                'id' => 1,
                'name' => 'Stater',
                'status' => 1,
                'updated_at' => '2021-09-07 06:22:48',
            ),
            1 => 
            array (
                'created_at' => '2021-09-07 06:17:50',
                'id' => 2,
                'name' => 'Snack',
                'status' => 1,
                'updated_at' => '2021-09-07 06:17:50',
            ),
            2 => 
            array (
                'created_at' => '2021-09-07 06:19:03',
                'id' => 3,
                'name' => 'Breakfast',
                'status' => 1,
                'updated_at' => '2021-09-07 06:19:03',
            ),
            3 => 
            array (
                'created_at' => '2021-09-07 06:22:58',
                'id' => 4,
                'name' => 'Main',
                'status' => 1,
                'updated_at' => '2021-09-07 06:22:58',
            ),
            4 => 
            array (
                'created_at' => '2021-09-07 06:23:11',
                'id' => 5,
                'name' => 'Dessert',
                'status' => 1,
                'updated_at' => '2021-09-07 06:23:11',
            ),
            5 => 
            array (
                'created_at' => '2021-09-07 06:23:32',
                'id' => 6,
                'name' => 'Drink',
                'status' => 1,
                'updated_at' => '2021-09-07 06:23:32',
            ),
        ));
        
        
    }
}