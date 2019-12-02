# Getting started
## Installation
Please check the official laravel installation guide for server requirements before you start. Official Documentation

Clone the repository

    git clone https://github.com/louievillena05/backend-developer-project.git
Switch to the repo folder

    cd backend-developer-project
Install all the dependencies using composer

    composer install
Install npm

    npm install
Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
Generate a new application key

    php artisan key:generate
Change Mailstrap username and password in the .env file

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=change this
    MAIL_PASSWORD=change this
    MAIL_ENCRYPTION=tls

Run the database migrations and seeder (Set the database connection in .env before migrating)

    php artisan migrate --seed
