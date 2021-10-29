## Requirements

-   php 7.4 upwards
-   MySQL Database
-   Composer

## Installation instructions

-   clone the project to your local machine
-   Using terminal/CMD tool navigate to the root dir of the project and then run "composer install"
-   create a new MySQL Database
-   edit the .env file, replace DB_DATABASE , DB_USERNAME, DB_PASSWORD with you own DB Details
-   i used mailtrap.io to test the emails, please replace MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION with your own email
    server credentials, mailtrap is highly recommended
-   Run migrations by opening the terminal/ command prompt tool and then navigate to the root DIR of the project and then run "php artisan migrate"
-   i've included a seeder file which creates admin users, to run it type "php artisan db:seed --class=CreateAdminUsers"
-   Now you can run the project by typing "php artisan serve" on your terminal or if you're on a UNIX base OS you can set up a vhost for it.
-   if the previous step was successful, use details from the seeder login as an admin user
-   im using Laravel Jobs to send emails, to set this up, run "php artisan queue:work"
-   NB, make sure the "queue" is running before you add any entry
-   from the admin dashboard, fill the entry form with the right info

## Tech Stack Used

-   Laravel 8
-   Jquery for AJAX Request and Front end Validations
-   Bootstrap 4
-   Repository Design / MVC
