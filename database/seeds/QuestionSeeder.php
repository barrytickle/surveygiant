<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            ['id'=>1, 'QuestionName'=>'What Is your name?', 'QuestionType'=>'Open'],
            ['id'=>2, 'QuestionName'=>'How Old Are You?', 'QuestionType'=>'Open'],
            ['id'=>3, 'QuestionName'=>'Where are you from?', 'QuestionType'=>'Open'],
        ]);
    }
}
