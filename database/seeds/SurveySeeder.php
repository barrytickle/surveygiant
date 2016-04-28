<?php

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert([
            ['id'=>1, 'name'=>'Are sports beneficial?', 'description'=>'Sport Survey', 'slug'=>'sport_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>2, 'name'=>'Is android better than iphone?', 'description'=>'Technology Survey', 'slug'=>'technology_survey_1', 'author_id'=>'1', 'expire'=>'30'],
        ]);
    }
}
