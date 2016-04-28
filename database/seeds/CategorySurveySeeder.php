<?php

use Illuminate\Database\Seeder;

class CategorySurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_surveys')->insert([
            ['surveys_id'=>1, 'category_id'=>'1'],
            ['surveys_id'=>2, 'category_id'=>'2'],
        ]);
    }
}
