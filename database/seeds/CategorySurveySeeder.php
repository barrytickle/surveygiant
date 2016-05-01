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
            ['surveys_id'=>3, 'category_id'=>'3'],
            ['surveys_id'=>4, 'category_id'=>'4'],
            ['surveys_id'=>5, 'category_id'=>'5'],
            ['surveys_id'=>6, 'category_id'=>'6'],
            ['surveys_id'=>7, 'category_id'=>'7'],
            ['surveys_id'=>8, 'category_id'=>'8'],
        ]);
    }
}
