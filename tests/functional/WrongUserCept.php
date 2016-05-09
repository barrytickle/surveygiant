<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Be redirected when I visit the wrong link');
//Creates a new user who does not have admin rights
$I->haveRecord('users', [
    'id' => '2',
    'name' => 'Test Name',
    'email' => 'test@test.com',
    'password' => 'password',
]);
// Will be logged in as the new user
Auth::loginUsingId(2);
//Will visit the page showing content for the wrong user
$I->amOnPage('/me/1/');
//Shouldn't be able to see the content connected to that user.
$I->cantSee('Are sports beneficial?');
//Should be redirected onto their own page
$I->seeCurrentUrlEquals('/me/2');



