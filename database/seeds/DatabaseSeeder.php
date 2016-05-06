<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(CategorySurveySeeder::class);
        $this->call(QuestionSurveySeeder::class);
    }
}
