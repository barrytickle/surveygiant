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
            ['id'=>1, 'CategoryName'=>'Sport', 'CategoryDescription'=>'Sport Category'],
            ['id'=>2, 'CategoryName'=>'Technology', 'CategoryDescription'=>'Technology Category'],
            ['id'=>3, 'CategoryName'=>'Science', 'CategoryDescription'=>'Science Category'],
            ['id'=>4, 'CategoryName'=>'Social', 'CategoryDescription'=>'Social Category'],
            ['id'=>5, 'CategoryName'=>'Education', 'CategoryDescription'=>'Education Category'],
            ['id'=>6, 'CategoryName'=>'Politics', 'CategoryDescription'=>'Politics Category'],
            ['id'=>7, 'CategoryName'=>'Gaming', 'CategoryDescription'=>'Gaming Category'],
            ['id'=>8, 'CategoryName'=>'Nature', 'CategoryDescription'=>'Nature Category'],
        ]);
    }
}
