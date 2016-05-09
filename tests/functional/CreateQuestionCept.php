<?php
$I = new FunctionalTester($scenario);
// log in as your admin user
// This should be id of 1 if you created your manual login for a known user first.
Auth::loginUsingId(1);
$I->wantTo('Add a question to a survey');
//User will have a test survey to be able to add a question to
$I->haveRecord('surveys', [
    'id'=> '999',
    'name'=>'Test Survey',
    'description' => 'testsurvey',
    'slug' => 'test_survey_999',
    'author_id'=> '1',
    'published'=>'1'
]);
//User will visit their own page
$I->amOnPage('/me/1');
//User will see the test survey
$I->see('Test Survey');
//User will be taken to the question modifier page for this survey
$I->amOnPage('/question/test_survey_999');
//Check to see if user is on right page
$I->see('Survey Questions');
//User will then be redirected to add question
$I->amOnPage('/question/test_survey_999/create');
//User will input question data for survey
$I->submitForm('.login-box', [
    'QuestionName' => 'Question 1',
    'QuestionType' => '1'
]);
//User will be redirected to the question url
$I->seeCurrentUrlEquals('/question/test_survey_999');
//User should see their question in the table.
$I->see('Question 1');
