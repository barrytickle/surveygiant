#Introduction
<p>Survey Giant is an open source Web Based survey creation application. The site is designed to open up all surveys for access for any user to response to. Each survey can have an expire date where all the results for the survey will stop, giving the user all the results on a selected day via an email update. The temporary account will give you access to the admin panel, giving you tools to play about with.</p>

#Currently not working
<ul>
    <li>Adding user to roles</li>
    <li>Removing user from roles</li>
    <li>Updating Category</li>
    <li>Survey Expire</li>
</ul>

#Requirements
<ul>
    <li>Git</li>
    <li>Composer</li>
    <li>MySQl WorkBench</li>
    <li>PHP</li>
    <li>Linux (Preferably Ubuntu)</li>
</ul>

#Instructions to install
<ol>
    <li>Ensure you have git installed on linux</li>
    <li>Open up a terminal on linux and navigate to the selected folder path to where you wish to install the site</li>
    <li>Using terminal enter the following command <code>git clone https://github.com/barrytickle/surveygiant.git</code> Doing this will take a few seconds</li>
    <li>Start up MySQl workbench, ensure that you have a working username and password to secure the db. Update the .env file to match your current credentials</li>
    <li>Click add a new schema, call the Schema <b>db_survey</b> with a <b>Utf-8 default Collation</b></li>
    <li>Using terminal, ensure that your file path is located in the same folder as the project. Type <code>php artisan migrate</code> This will populate your database with the tables required to run the application</li>
    <li>Again using terminal, run the command <code>php artisan db:seed</code> This will now populate your tables with some sample information for you to try out</li>
    <li>Login to the site, the email is: <b>admin@admin.com</b> and the password <b>test123</b></li>
    <li>Please report any bugs and errors you recieve while trying out the site.</li>
</ol>