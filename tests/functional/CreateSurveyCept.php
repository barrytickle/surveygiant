<?php 
$I = new FunctionalTester($scenario);
// log in as your admin user
Auth::loginUsingId(1);
$I->wantTo('Create a survey and see survey has been submitted');

//When
$I->amOnPage('/survey/create');
//User should see the option to create a survey
$I->see('Create a survey');
//User will enter sample data into the form and submit
$I->submitForm('.login-box', [
    'name' => 'Test Survey',
    'description' => 'Test',
    'expire'=>'30',
    'category[]' =>'1'
]);
//User should be redirected to their own ID
$I->seeCurrentUrlEquals('/me/1');
//User should be able to see their own survey which they created.
$I->see('Test Survey');