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
            ['id'=>3, 'name'=>'Does global warming exist?', 'description'=>'Science Survey', 'slug'=>'science_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>4, 'name'=>'Is facebook a distraction?', 'description'=>'Social Survey', 'slug'=>'social_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>5, 'name'=>'What is your best learning method?', 'description'=>'Education Survey', 'slug'=>'education_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>6, 'name'=>'General Election', 'description'=>'Politics Survey', 'slug'=>'politics_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>7, 'name'=>'Have you upgraded your console?', 'description'=>'Gaming Survey', 'slug'=>'gaming_survey_1', 'author_id'=>'1', 'expire'=>'30'],
            ['id'=>8, 'name'=>'Are you prepared for summer?', 'description'=>'Nature Survey', 'slug'=>'nature_survey_1', 'author_id'=>'1', 'expire'=>'30']
        ]);
    }
}
