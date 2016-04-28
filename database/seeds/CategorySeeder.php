<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id'=>1, 'CategoryName'=>'sport', 'CategoryDescription'=>'Sport Category'],
            ['id'=>2, 'CategoryName'=>'technology', 'CategoryDescription'=>'Technology Category'],
            ['id'=>3, 'CategoryName'=>'science', 'CategoryDescription'=>'Science Category'],
            ['id'=>4, 'CategoryName'=>'social', 'CategoryDescription'=>'Social Category'],
            ['id'=>5, 'CategoryName'=>'education', 'CategoryDescription'=>'Education Category'],
            ['id'=>6, 'CategoryName'=>'politics', 'CategoryDescription'=>'Politics Category'],
            ['id'=>7, 'CategoryName'=>'gaming', 'CategoryDescription'=>'Gaming Category'],
            ['id'=>8, 'CategoryName'=>'nature', 'CategoryDescription'=>'Nature Category'],
        ]);
    }
}
