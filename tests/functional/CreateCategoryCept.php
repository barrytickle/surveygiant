<?php 
$I = new FunctionalTester($scenario);
// log in as your admin user
Auth::loginUsingId(1);
$I->wantTo('Create a category as an admin');
//When
$I->amOnPage('/admin/category');
//Admin should see the option to edit category
$I->see('Edit Categories');
//Admin will click add new category
$I->click('Add New Category');
//admin will be taken to the create new category page
$I->canSeeCurrentUrlEquals('/admin/category/create');
//admin will fill out the form with new data.
$I->submitForm('.login-box', [
    'CategoryName' => 'Test Category',
    'CategoryDescription' => 'Test Description'
]);
//Admin will be redirected to this url
$I->canSeeCurrentUrlEquals('/admin/category');
//Admin will visit the home page
$I->amOnPage('/');
//Check to see if home page is the current URL
$I->canSeeCurrentUrlEquals('/');
//Admin can now see that the category he entered has been displayed
$I->canSee('Test Category', 'h2');
