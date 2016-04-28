<?php

use Illuminate\Database\Seeder;

class QuestionSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_surveys')->insert([
            ['surveys_id'=>2, 'question_id'=>'1'],
            ['surveys_id'=>2, 'question_id'=>'2'],
            ['surveys_id'=>2, 'question_id'=>'3'],
        ]);
    }
}
